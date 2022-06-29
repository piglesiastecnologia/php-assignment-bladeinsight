<?php

use PHPUnit\Framework\TestCase;

class TurbineControllerTest extends TestCase
{

    private $http;

    public function setUp(): void
    {
        $this->http = new GuzzleHttp\Client(['http_errors' => false]);
    }

    public function tearDown(): void
    {
        $this->http = null;
    }


    /**
     * testShowAllTurbineWhenSuccessAndEmpty
     * Testa se o código de resposta é 200 e se nao vem nada na base
     *
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testShowAllTurbineWhenSuccessAndEmpty()
    {
        //Realizamos uma requisição do tipo GET na URL informada
        $response = $this->http->request('GET', 'localhost:8000/turbine');

        //Através do método getStatusCode(), conseguimos saber qual o status de resposta.
        //Verificamos se o status de resposta é 200, caso informamos um usuário inválido, o status seria 400.
        $this->assertEquals(200, $response->getStatusCode());

        //Obtemos o JSON da resposta e decodificamos para objeto.
        $body = json_decode($response->getBody()->getContents());

        //Verificamos se NAO contém algum conteudo no $body
        $this->assertEmpty($body);
    }

    /**
     * testShowAllTurbineWhenSuccessAndNotEmpty
     * Testa se o código de resposta é 200 e se nao vem algo da base
     *
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testShowAllTurbineWhenSuccessAndNotEmpty()
    {
        //Realizamos uma requisição do tipo GET na URL informada
        $response = $this->http->request('GET',
                                            'localhost:8000/turbine');

        //Através do método getStatusCode(), conseguimos saber qual o status de resposta.
        //Verificamos se o status de resposta é 200, caso informamos um usuário inválido, o status seria 400.
        $this->assertEquals(200, $response->getStatusCode());

        //Obtemos o JSON da resposta e decodificamos para objeto.
        $body = json_decode($response->getBody()->getContents());

        //Verificamos se contém algum conteudo no $body
        $this->assertNotEmpty($body);
    }

    /**
     * testShowDetailTurbineWhenSuccessAndEmpty
     * Testa se o código de resposta é 200 e se nao vem nada na base
     *
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testShowDetailTurbineWhenSuccessAndEmpty()
    {
        //Realizamos uma requisição do tipo GET na URL informada
        $response = $this->http->request('GET', 'localhost:8000/turbine/1');

        //Através do método getStatusCode(), conseguimos saber qual o status de resposta.
        //Verificamos se o status de resposta é 200, caso informamos um usuário inválido, o status seria 400.
        $this->assertEquals(200, $response->getStatusCode());

        //Obtemos o JSON da resposta e decodificamos para objeto.
        $body = json_decode($response->getBody()->getContents());

        //Verificamos se NAO contém algum conteudo no $body
        $this->assertEmpty($body);
    }

    /**
     * testShowDetailTurbineWhenSuccessAndNotEmpty
     * Testa se o código de resposta é 200 e se nao vem nada na base
     *
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testShowDetailTurbineWhenSuccessAndNotEmpty()
    {
        //Realizamos uma requisição do tipo GET na URL informada
        $response = $this->http->request('GET','localhost:8000/turbine/1');

        //Através do método getStatusCode(), conseguimos saber qual o status de resposta.
        //Verificamos se o status de resposta é 200, caso informamos um usuário inválido, o status seria 400.
        $this->assertEquals(200, $response->getStatusCode());

        //Obtemos o JSON da resposta e decodificamos para objeto.
        $body = json_decode($response->getBody()->getContents());

        //Verificamos se contém algum conteudo no $body
        $this->assertNotEmpty($body);
    }


    /**
     * testDeleteTurbineWithoutLogin
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testDeleteTurbineWithoutLogin()
    {

        //Realizamos uma requisição do tipo POST na URL informada
        $response = $this->http->post('localhost:8000/turbine/1', [
            'headers'=> ['X-Custom-Authorization' => ""],
        ]);

        //Através do método getStatusCode(), conseguimos saber qual o status de resposta.
        //Verificamos se o status de resposta é 405, caso informamos um usuário inválido, o status seria 400.
        $this->assertEquals(405, $response->getStatusCode());


    }


    public function testCreateTurbine()
    {

        //Realizamos uma requisição do tipo GET na URL informada
        $response = $this->http->post('localhost:8000/turbine/create', [
            'headers'=> ['X-Custom-Authorization' => "6IEQ64JVS9dflFnPhZPjtSxaATSifTLNvNFSZ59Zl9GCz8oAh19UaLS8nX4Xk2BLs2bLbb3vF7TGl7m8XgzqorQHmUYyhiT111ZQ"],
            'form_params' => [
                'slug' => 'Gamesa-2022-1',
                'manufacture' => 'Gamesa-2022',
                'dimension_positive' => '39.025322113',
                'dimension_negative' => '-9.045674321',
            ],
            'debug' => true
        ]);

        //Através do método getStatusCode(), conseguimos saber qual o status de resposta.
        //Verificamos se o status de resposta é 201, caso informamos um usuário inválido, o status seria 400.
        $this->assertEquals(201, $response->getStatusCode());

    }


    /**
     * testUpdateTurbine
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testUpdateTurbine()
    {
        //Realizamos uma requisição do tipo GET na URL informada
        $response = $this->http->post('localhost:8000/turbine/update/8', [
            'headers'=> ['X-Custom-Authorization' => "6IEQ64JVS9dflFnPhZPjtSxaATSifTLNvNFSZ59Zl9GCz8oAh19UaLS8nX4Xk2BLs2bLbb3vF7TGl7m8XgzqorQHmUYyhiT111ZQ"],
            'form_params' => [
                'manufacture' => 'Gamesa-2022-1',
                'dimension_positive' => '39.025322115',
                'dimension_negative' => '-9.045674323',
            ],
            'debug' => true
        ]);

        //Através do método getStatusCode(), conseguimos saber qual o status de resposta.
        //Verificamos se o status de resposta é 200, caso informamos um usuário inválido, o status seria 400.
        $this->assertEquals(200, $response->getStatusCode());
    }


    /**
     * testDeleteTurbine
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testDeleteTurbine()
    {
        //Realizamos uma requisição do tipo DELETE na URL informada
        $response = $this->http->delete('localhost:8000/turbine/delete/8', [
            'headers'=> ['X-Custom-Authorization' => "6IEQ64JVS9dflFnPhZPjtSxaATSifTLNvNFSZ59Zl9GCz8oAh19UaLS8nX4Xk2BLs2bLbb3vF7TGl7m8XgzqorQHmUYyhiT111ZQ"],
            'debug' => true
        ]);

        //Através do método getStatusCode(), conseguimos saber qual o status de resposta.
        //Verificamos se o status de resposta é 200, caso informamos um usuário inválido, o status seria 400.
        $this->assertEquals(200, $response->getStatusCode());
    }


}
