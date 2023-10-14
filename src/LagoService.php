<?php

namespace Zehntinel\LaravelLago;

use GuzzleHttp\Exception\GuzzleException;
use Zehntinel\LaravelLago\Contracts\LagoServiceContract;
use GuzzleHttp\Client;
use Zehntinel\LaravelLago\DataTransferObjects\LagoPlan;

class LagoService implements LagoServiceContract
{
    private Client $client;

    public function __construct(
        private readonly array $config
    ) {
        $this->client = new Client(['base_uri' => $this->getBaseUrl()]);
    }

    /**
     * @return mixed
     * @throws GuzzleException
     */
    public function plans(): array
    {
        $plans = [];
        $response = $this->client->request(
            method: 'GET',
            uri: $this->getBaseUrl() . '/api/v1/plans',
            options:[
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $this->getApiKey(),
                ],
            ]
        );

        $contents = $response->getBody()->getContents();
        $contentsArray = json_decode($contents);

        foreach ($contentsArray->plans as $plan) {
            $plans[] = new LagoPlan(
                lago_id: $plan->lago_id,
                name: $plan->name,
                code: $plan->code,
                interval: $plan->interval,
                amount_cents: $plan->amount_cents,
                amount_currency: $plan->amount_currency,
                created_at: $plan->created_at
            );
        }

        return $plans;
    }

    protected function getBaseUrl(): string
    {
        return sprintf('%s', $this->config['base_url'] ?? '');
    }

    protected function getApiKey() :string
    {
        return sprintf('%s', $this->config['api_key'] ?? '');
    }
}
