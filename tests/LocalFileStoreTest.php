<?php

namespace OPENLOGI\Salesforce\Tests;

use \Mockery as m;

class LocalFileStoreTest extends TestCase
{
    /** @test */
    public function file_store_can_be_instantiated()
    {
        $tokenGenerator = m::mock('OPENLOGI\Salesforce\AccessTokenGenerator');
        $config = m::mock('OPENLOGI\Salesforce\TokenStore\LocalFileConfigInterface');
        $config->shouldReceive('getFilePath')->once()->andReturn('/foo');
        $fileStore = new \OPENLOGI\Salesforce\TokenStore\LocalFile($tokenGenerator, $config);

        $this->assertInstanceOf(\OPENLOGI\Salesforce\TokenStore\LocalFile::class, $fileStore);
    }
}
