<?php

use PHPUnit\Framework\TestCase;

class UsersControllerTest extends TestCase {
    private $http;

    public function setUp(): void
    {
        $this->http = new GuzzleHttp\Client(['http_errors' => false]);
    }

    public function tearDown(): void
    {
        $this->http = null;
    }

    public function testLogin() {

        //Realizamos uma requisição do tipo POST na URL informada
        $response = $this->http->post('localhost:8000/login', [
            // 'headers'=> ['Authorization' => ""],
            'form_params' => [
                'username' => 'admin',
                'password' => 'admin',
            ]
        ]);

        //Através do método getStatusCode(), conseguimos saber qual o status de resposta.
        //Verificamos se o status de resposta é 200, caso informamos um usuário inválido, o status seria 400.
        $this->assertEquals(200, $response->getStatusCode());

    }

    public function testRegister() {
        //Realizamos uma requisição do tipo POST na URL informada
        $response = $this->http->post('localhost:8000/register', [
            // 'headers'=> ['Authorization' => ""],
            'form_params' => [
                'name' => 'Teste2',
                'username' => 'admin2',
                'password' => 'admin',
            ],
            'debug' => true
        ]);

        //Através do método getStatusCode(), conseguimos saber qual o status de resposta.
        //Verificamos se o status de resposta é 200, caso informamos um usuário inválido, o status seria 400.
        $this->assertEquals(201, $response->getStatusCode());

        //Obtemos o JSON da resposta e decodificamos para objeto.
        $body = json_decode($response->getBody()->getContents());

        //Verificamos se contém o indice id ao mesmo tempo que validamos se é um inteiro válido
        $this->assertNotEmpty($body);

    }

    public function testLogout() {

    }
}
