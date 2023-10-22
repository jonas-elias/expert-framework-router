<?php

declare(strict_types=1);

namespace ExpertFramework\Http;

use ExpertFramework\Http\Contract\ResponseInterface;

/**
 * class Response
 *
 * @package ExpertFramework\Http
 * @author jonas-elias
 */
class Response extends ResponseEmmiter implements ResponseInterface
{
    /**
     * @var int $statusCode
     */
    public int $statusCode = 200;

    /**
     * @var array $headers
     */
    public array $headers = [];

    /**
     * @var string $body
     */
    public string $body = '';

    /**
     * Method to send json
     *
     * @param ?array $data
     * @param ?int statusCode
     * @return ResponseInterface
     */
    public function json(?array $data = [], ?int $statusCode = 200): ResponseInterface
    {
        $this->body = json_encode($data);
        $this->statusCode = $statusCode;
        $this->headers = ['Content-type:' => 'application/json'];

        $this->sendJson($this);

        return $this;
    }

    /**
     * Method to send yaml
     *
     * @param ?array $data
     * @param ?int statusCode
     * @return ResponseInterface
     */
    public function yaml(?string $data = '', ?int $statusCode = 200): ResponseInterface
    {
        $this->body = $data;
        $this->statusCode = $statusCode;
        $this->headers = ['Content-Type:' => 'application/x-yaml'];

        $this->sendYaml($this);

        return $this;
    }
}
