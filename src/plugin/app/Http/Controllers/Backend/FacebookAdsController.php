<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Input;

class FacebookAdsController extends BackendController {

    public function stats() {
    	$app_id = config('facebook.app_id');
		$app_secret = config('facebook.app_secret');
		$access_token = config('facebook.access_token');
		\FacebookAds\Api::init($app_id, $app_secret, $access_token);

		$data = array();
		$pixel_id = config('facebook.pixel_id');
		$data['pixel_id'] = $pixel_id;
		$data['devices'] = $this->pixelStats($pixel_id, 'device_type', '-1 month');
		$data['browsers'] = $this->pixelStats($pixel_id, 'browser_type', '-1 month');
		$data['urls'] = $this->pixelStats($pixel_id, 'url', '-1 month');
		
		return view('backend.facebook.pixel_stats', $data);
    }

    private function pixelStats($pixel_id, $filter, $from_time)
    {
    	$pixel = new \FacebookAds\Object\AdsPixel($pixel_id);
		return $this->getResults($pixel->getStats(array(), array(
		  'aggregation' => $filter,
		  'start_time' => (new \DateTime($from_time))->getTimestamp(),
		  'end_time' => (new \DateTime("now"))->getTimestamp(),
		)));
    }

    private function getResults(\FacebookAds\Cursor $results)
    {
		$res_total = 0;
		$results_arr = array();
		foreach ($results as $row) {
			if (isset($results_arr[$row->data[0]['value']])) {
				$results_arr[$row->data[0]['value']] += $row->data[0]['count'];
			} else {
				$results_arr[$row->data[0]['value']] = $row->data[0]['count'];
			}
			$res_total += $row->data[0]['count'];
		}
		return array('total' => $res_total, 'data' => $results_arr);
    }

}
