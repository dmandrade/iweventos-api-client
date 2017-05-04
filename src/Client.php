<?php
/**
 * Created by PhpStorm.
 * User: danil
 * Date: 03/05/2017
 * Time: 14:02
 */

namespace Dmandrade\IWEventos\Api;

use Dmandrade\IWEventos\Api\Plugin\BearerTokenAuthPlugin;
use Guzzle\Service\Client as GuzzleClient;
use Guzzle\Service\Description\ServiceDescription;

/**
 * IWEventos API Client
 *
 * @method Client congressistasById(array|null $parameters = null)
 * @method Client congressistasBy(array|null $parameters = null)
 * @method Client datas(array|null $parameters = null)
 * @method Client salas(array|null $parameters = null)
 * @method Client tipoAtividades(array|null $parameters = null)
 * @method Client eventos(array|null $parameters = null)
 * @method Client funcoesPalestrantes(array|null $parameters = null)
 * @method Client palestrantes(array|null $parameters = null)
 * @method Client atividades(array|null $parameters = null)
 * @method Client subatividades(array|null $parameters = null)
 *
 * @package App\Services\IWEventos
 */
class Client extends GuzzleClient
{
    /**
     * @param string           $baseUrl Base URL of the web service
     * @param array|Collection $config  Configuration settings
     *
     * @throws RuntimeException if cURL is not installed
     */
    public function __construct($baseUrl = '', $access_token, $config = null)
    {
        parent::__construct($baseUrl, $config);
        // Set the service description
        $this->setDescription(ServiceDescription::factory(__DIR__ . '/Resources/iweventos.json'));
        $this->addSubscriber(new BearerTokenAuthPlugin($access_token));
        $this->setDefaultOption('headers/Accept-Charset', 'utf-8');
        $this->setDefaultOption('headers/Accept', 'application/json');
        $this->setDefaultOption('headers/Content-Type', 'application/json');
    }

}
