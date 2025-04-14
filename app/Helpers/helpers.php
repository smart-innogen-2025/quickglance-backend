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
    $errors = [];
    $validatedInputs = [];
    $definedInputs = json_decode($actionInputDefinition, true) ?? [];

    // Convert user inputs to array if they're in string format
    $userInputs = is_string($userInputs) ? json_decode($userInputs, true) : ($userInputs ?? []);

    foreach ($definedInputs as $definedInput) {
        $inputKey = $definedInput['key'] ?? null;
        $inputLabel = $definedInput['label'] ?? null;
        $isRequired = $definedInput['required'] ?? true;
        
        // Check for missing required inputs
        if ($isRequired) {
            if (!isset($userInputs[$inputKey]) && !isset($userInputs[$inputLabel])) {
                $errors[] = "Missing required input: {$inputLabel}";
                continue;
            }
        }

        // Only validate if input exists (optional fields may be empty)
        if (isset($userInputs[$inputKey])) {
            $value = $userInputs[$inputKey];
            $validationError = validateInputValue($definedInput, $value);

            if ($validationError) {
                $errors[] = $validationError;
            } else {
                // Store validated input
                $validatedInputs[$inputKey] = $value;
            }
        } else if (isset($userInputs[$inputLabel])) {
            $value = $userInputs[$inputLabel];
            $validationError = validateInputValue($definedInput, $value);

            if ($validationError) {
                $errors[] = $validationError;
            } else {
                // Store validated input
                $validatedInputs[$inputLabel] = $value;
            }
        } else if(isset($defineInput['default'])) {
            // Use default value if available
            $validatedInputs[$inputLabel] = $definedInput['default'];
        }

    }

    return [
        'valid' => empty($errors),
        'errors' => $errors,
        'validated_inputs' => $validatedInputs
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
