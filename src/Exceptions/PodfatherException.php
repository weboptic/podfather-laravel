<?php

namespace Podfather\Exceptions;

use Exception;
use Illuminate\Http\Client\RequestException;

class PodfatherException extends Exception
{
    protected array $errors = [];
    protected string $error_type;
    protected array $response = [];

    /**
     * @param RequestException $e
     * @return never
     * @throws PodfatherException
     */
    public static function fromException(RequestException $e): never
    {
        throw new static($e->response->json());
    }

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->response = $data;
        $this->errors = $data['errors'] ?? [];
        $this->error_type = $data['type'] ?? 'api_error';

        $message = $data['title'] ?? 'Podfather API Error';

        if ($this->errors) {
            $message .= ': ' . implode('; ', $this->errors);
        }

        parent::__construct($message, $data['status'] ?? 400);
    }

    /**
     * @return array
     */
    public function errors(): array
    {
        return $this->errors;
    }

    /**
     * @return string
     */
    public function type(): string
    {
        return $this->error_type;
    }
}
