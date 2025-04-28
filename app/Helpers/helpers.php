<?php

use Illuminate\Support\Str;

if (!function_exists('convertKeysToCamelCase')) {
    function convertKeysToCamelCase($data)
    {
        if (is_array($data)) {
            return collect($data)->mapWithKeys(function ($value, $key) {
                $newKey = is_string($key) ? Str::camel($key) : $key;

                return [$newKey => convertKeysToCamelCase($value)];
            })->toArray();
        }

        // If it's a collection (Laravel collection), convert to array then recurse
        if ($data instanceof \Illuminate\Support\Collection) {
            return convertKeysToCamelCase($data->toArray());
        }

        return $data;
    }

    /**
 * Validate user inputs against action's input definition
 */
function validateActionInputs($actionInputDefinition, $userInputs)
{
    $errors           = [];
    $validatedInputs  = [];

    // 1) Decode the definitions & incoming inputs
    $definedInputs = is_string($actionInputDefinition)
        ? json_decode($actionInputDefinition, true) ?? []
        : ($actionInputDefinition ?? []);

    $userInputs = is_string($userInputs)
        ? (json_decode($userInputs, true) ?? [])
        : ($userInputs ?? []);

    foreach ($definedInputs as $def) {
        $key       = $def['key']     ?? null;
        $label     = $def['label']   ?? $key;
        $required  = $def['required'] ?? false;

        // 2) Missing required?
        if ($required && ! array_key_exists($key, $userInputs)) {
            $errors[] = "Missing required input: {$label}";
            continue;
        }

        // 3) Pick the value (user‐supplied takes priority)
        if (array_key_exists($key, $userInputs)) {
            $value = $userInputs[$key];
        } elseif (array_key_exists($label, $userInputs)) {
            $value = $userInputs[$label];
        } elseif (array_key_exists('default', $def)) {
            $value = $def['default'];
        } else {
            // nothing to validate or store
            continue;
        }

        // 4) Allow explicit nulls
        if ($value === null) {
            $validatedInputs[$key] = null;
            continue;
        }

        // 5) Otherwise run through your existing validator
        $validationError = validateInputValue($def, $value);
        if ($validationError) {
            $errors[] = $validationError;
        } else {
            $validatedInputs[$key] = $value;
        }
    }

    return [
        'valid'            => empty($errors),
        'errors'           => $errors,
        'validated_inputs' => $validatedInputs,
    ];
}

/**
 * Validate a single input value against its definition
 */
function validateInputValue($definedInput, $value)
{
    $inputLabel = $definedInput['label'] ?? 'unknown';
    $type = $definedInput['type'] ?? 'text';

    switch ($type) {
        case 'number':
            if (!is_numeric($value)) {
                return "Input {$inputLabel} must be a number";
            }
            if (isset($definedInput['min']) && $value < $definedInput['min']) {
                return "Input {$inputLabel} must be at least {$definedInput['min']}";
            }
            if (isset($definedInput['max']) && $value > $definedInput['max']) {
                return "Input {$inputLabel} must be at most {$definedInput['max']}";
            }
            break;
            
        case 'select':
            $options = $definedInput['options'] ?? [];
            if (!in_array($value, $options)) {
                return "Input {$inputLabel} must be one of: " . implode(', ', $options);
            }
            break;
            
        case 'array':
            if (!is_array($value)) {
                return "Input {$inputLabel} must be an array";
            }
            break;
            
        case 'time':
            if (!preg_match('/^\d{1,2}:\d{2}(?::\d{2})?(?:\s?[AP]M)?$/i', $value)) {
                return "Input {$inputLabel} must be a valid time format";
            }
            break;
            
    }

    return null;
}
}
