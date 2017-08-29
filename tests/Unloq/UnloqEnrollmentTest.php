<?php 
namespace Unloq\Tests;
use PHPUnit\Framework\TestCase;
use Unloq\Api\Contracts\Enrollment\Enroll;
use Unloq\Unloq;
use Unloq\Tests\EnvironmentTest;
/**
*  UnloqEnrollmentTest class
*
*  @author Florin Popescu <florin@unloq.io>
*/
class UnloqEnrollmentTest extends TestCase {

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
     *
     */
    public function testBogusUserIsEnrolled(){
        $enrolled = new Enroll();
        $enrolled->setEmail('bogus_sdf43fs342sdf@unloq.io');

        $result = $this->unloq->isEnrolled($enrolled);

        $this->assertEquals(200, $result->httpCode);
        $this->assertFalse($result->responseMessage->result->enrolled);
    }

    /**
     * A bogus email is checked if is enrolled. The expected result should contain:
     * - HTTP status code 200
     * - the result->exists field value to be false (the email is not enrolled yet)
     * - the result->qr_url field should be bigger than 0 (a QR image is provided
     * for device syncronization)
     *
     */
    public function testEnroll(){
        $enrolled = new Enroll();
        $enrolled->setEmail('enrollment_test_email@unloq.io');

        $result = $this->unloq->enroll($enrolled);

        $this->assertEquals(200, $result->httpCode);
        $this->assertFalse($result->responseMessage->result->exists);
        $this->assertGreaterThan(0, strlen($result->responseMessage->result->qr_url));

        return $enrolled->getEmail();
    }

    /**
     * Checks if the email used in the previous test has been enrolled.
     *
     * It is not possible to check the enrollment of the email used
     * previously as this will be added as a virtual profile, due
     * to the fact that it is not an actual UNLOQ account.
     * Read more @ https://docs.unloq.io/api-v1/post-enroll
     *
     * Taking that into consideration we we'll repeat the enrollment
     * with a developer email account which has a real UNLOQ account.
     *
     * @return string
     */
    public function testUserEnrolmentStatus(){
        $enrolled = new Enroll();
        $enrolled->setEmail('florin@unloq.io');

        $enroll = $this->unloq->enroll($enrolled);

        $this->assertEquals(200, $enroll->httpCode);

        $testEnroll = $this->unloq->isEnrolled($enrolled);

        $this->assertEquals(200, $testEnroll->httpCode);
        $this->assertTrue($testEnroll->responseMessage->result->enrolled);

        return $enrolled->getEmail();
    }

    /**
     * Un-enrolls the email previously enrolled (developer email : florin@unloq.io).
     * Please see previous explanation regarding virtual profiles
     *
     * The expected result contains:
     * - HTTP status code 200
     * - the result->deactivated field value to be true
     *
     * @depends testUserEnrolmentStatus
     */
    public function testUserDeactivation($email){
        $enrolled = new Enroll();
        $enrolled->setEmail($email);

        $result = $this->unloq->deactivate($enrolled);

        $this->assertEquals(200, $result->httpCode);
        $this->assertTrue($result->responseMessage->result->deactivated);
    }

}