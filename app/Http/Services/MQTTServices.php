<!-- 

namespace App\Services;

use Bluerhinos\phpMQTT\phpMQTT;

class MQTTService
{
    protected $mqtt;

    public function __construct()
    {
        $config = config('mqtt');
        $this->mqtt = new phpMQTT($config['broker'], $config['port'], $config['client_id']);
        if ($this->mqtt->connect(true, NULL, $config['username'], $config['password'])) {
            $this->mqtt->debug = true; // Enable debugging if needed
        }
    }

    public function publish($topic, $message)
    {
        $this->mqtt->publish($topic, $message, 0);
    }

    public function subscribe($topic, $callback)
    {
        $this->mqtt->subscribe($topic, 0);
        while ($this->mqtt->proc()) {
            $callback($this->mqtt->topic, $this->mqtt->message);
        }
    }

    public function disconnect()
    {
        $this->mqtt->close();
    }
}  -->