<?php

namespace DemosEurope\DemosplanAddon\Validator;

use DemosEurope\DemosplanAddon\Utilities\Json;
use JsonException;
use JsonSchema\Exception\InvalidSchemaException;
use JsonSchema\Validator;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;
use Webmozart\Assert\Assert;

class JsonSchemaValidator
{
    /**
     * @throws InvalidSchemaException On invalid content
     * @throws JsonException          On invalid schema or json object file
     */
    public function validate(string $json, string $schemaPath): void
    {
        if (!$jsonSchema = file_get_contents($schemaPath)) {
            throw new FileNotFoundException('File not found in path: ' . $schemaPath);
        }

        $validator = new Validator();

        $schemaObject = Json::decodeToMatchingType($jsonSchema);
        $jsonObject = Json::decodeToMatchingType($json);

        $validator->validate($jsonObject, $schemaObject);

        if (!$validator->isValid()) {
            $errorMsgs = [];

            $errors = $validator->getErrors();
            Assert::isArray($errors);
            foreach ($errors as $error) {
                $errorMsg = 'Json Schema Error. Field "' . $error['property'] . '". ';
                $errorMsg .= $error['message'];
                $errorMsgs[] = $errorMsg;
            }

            $errorMsg = implode("\n", $errorMsgs);
            throw new InvalidSchemaException($errorMsg);
        }
    }
}

