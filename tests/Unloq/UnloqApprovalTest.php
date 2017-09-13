<?php 
namespace Unloq\Tests;
use PHPUnit\Framework\TestCase;

use Unloq\Unloq;
use Unloq\Api\Contracts\Approval\Authenticate;
use Unloq\Api\Contracts\Approval\Authorize;
use Unloq\Api\Contracts\Approval\Encryption;
use Unloq\Tests\EnvironmentTest;

/**
*  UnloqApprovalTest class
*
*  @author Florin Popescu <florin@unloq.io>
*/
class UnloqApprovalTest extends TestCase {

    /**
     * @var object
     */
    protected $unloq;

    public function setUp()
    {
        $this->unloq =  new Unloq(EnvironmentTest::APP_KEY);
    }

    /**
     * A bogus email is checked if is enrolled. The expected result contains:
     * - HTTP status code 200
     * - the result->enrolled field value to be false
     */
    public function testAuthenticate(){
        $enrolled = new Authenticate();
        $enrolled->setEmail('bogus_sdf43fs342sdf@unloq.io');

        $result = $this->unloq->authenticate($enrolled);

        $this->assertEquals(200, $result->httpCode);
        $this->assertFalse($result->responseMessage->result->enrolled);
    }
}