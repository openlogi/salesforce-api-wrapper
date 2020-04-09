<?php

namespace OPENLOGI\Salesforce\Tests;

class ClientConfigTest extends TestCase {

    /** @test */
    public function client_config_can_be_instantiated()
    {
        $sfClientConfig = new \OPENLOGI\Salesforce\ClientConfig('url', 'clientId', 'clientSecret', 'v37.0');

        $this->assertInstanceOf(\OPENLOGI\Salesforce\ClientConfig::class, $sfClientConfig);
        $this->assertInstanceOf(\OPENLOGI\Salesforce\ClientConfigInterface::class, $sfClientConfig);
    }

    /** @test */
    public function client_config_data_can_be_accessed()
    {
        $sfClientConfig = new \OPENLOGI\Salesforce\ClientConfig('url', 'clientId', 'clientSecret', 'v37.0');

        $this->assertEquals('url', $sfClientConfig->getLoginUrl());
        $this->assertEquals('clientId', $sfClientConfig->getClientId());
        $this->assertEquals('clientSecret', $sfClientConfig->getClientSecret());
        $this->assertEquals('v37.0', $sfClientConfig->getVersion());
    }

    /** @test */
    public function client_config_knows_if_all_values_have_been_set()
    {
        $sfClientConfig = new \OPENLOGI\Salesforce\ClientConfig('', 'clientId', 'clientSecret', 'v37.0');

        $this->assertFalse($sfClientConfig->isFullyConfigured());

        $sfClientConfig = new \OPENLOGI\Salesforce\ClientConfig('hello', '', 'clientSecret', 'v37.0');
        $this->assertFalse($sfClientConfig->isFullyConfigured());

        $sfClientConfig = new \OPENLOGI\Salesforce\ClientConfig('hello', 'testing', '', 'v37.0');
        $this->assertFalse($sfClientConfig->isFullyConfigured());

        $sfClientConfig = new \OPENLOGI\Salesforce\ClientConfig('hello', 'clientId', 'clientSecret', '');
        $this->assertFalse($sfClientConfig->isFullyConfigured());

        $sfClientConfig = new \OPENLOGI\Salesforce\ClientConfig('hello', 'clientId', 'clientSecret', 'v37.0');
        $this->assertTrue($sfClientConfig->isFullyConfigured());

        $sfClientConfig = new \OPENLOGI\Salesforce\ClientConfig('', '', '', '');
        $this->assertFalse($sfClientConfig->isFullyConfigured());
    }
}
