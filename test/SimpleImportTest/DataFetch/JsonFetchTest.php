<?php
/**
 * YAWIK
 *
 * @filesource
 * @license    MIT
 * @copyright  2013 - 2017 Cross Solution <http://cross-solution.de>
 * @author Miroslav Fedeleš <miroslav.fedeles@gmail.com>
 * @since 0.30
 */

namespace SimpleImportTest\DataFetch;

use SimpleImport\DataFetch\HttpFetch;
use SimpleImport\DataFetch\JsonFetch;

/**
 * @coversDefaultClass \SimpleImport\DataFetch\JsonFetch
 */
class JsonFetchTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var JsonFetch
     */
    private $target;

    /**
     * @var HttpFetch
     */
    private $httpFetch;

    /**
     * @see \PHPUnit_Framework_TestCase::setUp()
     */
    protected function setUp()
    {
        $this->httpFetch = $this->getMockBuilder(HttpFetch::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->target = new JsonFetch($this->httpFetch);
    }

    /**
     * @covers ::__construct()
     * @covers ::fetch()
     */
    public function testFetchWithSuccessfulResponse()
    {
        $uri = 'uriString';
        $dataDecoded = ['key' => 'value'];
        $dataEncoded = json_encode($dataDecoded);

        $this->httpFetch->expects($this->once())
            ->method('fetch')
            ->with($uri)
            ->willReturn($dataEncoded);

        $this->assertSame($dataDecoded, $this->target->fetch($uri));
    }

    /**
     * @covers ::__construct()
     * @covers ::fetch()
     * @expectedException RuntimeException
     * @expectedExceptionMessage Invalid data
     */
    public function testFetchWithInvalidData()
    {
        $this->httpFetch->expects($this->once())
            ->method('fetch')
            ->willReturn('invalidJsonData');

        $this->target->fetch('uriString');
    }
}
