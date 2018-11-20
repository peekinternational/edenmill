<?php

namespace Edenmill;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
        protected  $table = 'settings';
        protected $fillable = ['type','group','title','value'];
        protected $dates = [];
        public $timestamps = false;
       /* public function scopeSite ($query){
              return $query->whereGroup('site');
        }

        public function scopeTheme($query){
                return $query->whereGroup('them');
        }*/

        public static function site(){
                $settings = Settings::whereGroup('site')->orderBy('type')->get();
                if($settings->count()>0) {
                        $data = [];
                        foreach ($settings as $item) {
                                if (!key_exists($item['type'], $data)) {
                                        $new_item = array(
                                                'id' => $item['id'],
                                                'title' => $item['title'],
                                                'value' => $item['value']
                                        );
                                        $data[$item['type']] = $new_item;
                                } else {
                                        $new_item = array(
                                                'id' => $item['id'],
                                                'title' => $item['title'],
                                                'value' => $item['value']
                                        );
                                        array_push($data[$item['type']], $new_item);
                                }

                        }
                        return $data;
                }
                return false;
        }
/*        public static function site(){
                $settings = Settings::whereGroup('site')->orderBy('order_by')->get();
                if($settings->count()>0) {
                        $data = [];
                        foreach ($settings as $item) {

                                if (!key_exists($item['type'], $data)) {
                                        $new_item = array(
                                                'id' => $item['id'],
                                                'title' => $item['title'],
                                                'value' => $item['value']
                                        );
                                        $data[$item['type']] = array($new_item);
                                } else {
                                        $new_item = array(
                                                'id' => $item['id'],
                                                'title' => $item['title'],
                                                'value' => $item['value']
                                        );
                                        array_push($data[$item['type']], $new_item);
                                }

                        }
                        return $data;
                }
                 return false;
        }*/


        public static function theme(){
                $settings = Settings::whereGroup('theme')->orderBy('type')->get();
                if($settings->count()>0) {
                        $data = [];
                        foreach ($settings as $item) {
                                if (!key_exists($item['type'], $data)) {
                                        $new_item = array(
                                                'id' => $item['id'],
                                                'title' => $item['title'],
                                                'value' => $item['value']
                                        );
                                        $data[$item['type']] = $new_item;
                                } else {
                                        $new_item = array(
                                                'id' => $item['id'],
                                                'title' => $item['title'],
                                                'value' => $item['value']
                                        );
                                        array_push($data[$item['type']], $new_item);
                                }

                        }
                        return $data;
                }
                return false;
        }

        public static function galleryCategories(){
                $settings = Settings::whereGroup('gallery')->whereType('category')->get();
                 if($settings->count()>0) {
                        $data = [];
                        foreach ($settings as $item) {
                                $new_item = array(
                                        'id' => $item->id,
                                        'title' => $item->title,
                                        'value' => $item->value
                                );
                                array_push($data, $new_item);
                        }

                        return collect($data);
                }
                return false;
        }

        public static function map(){
                $settings = Settings::whereGroup('map')->orderBy('type')->get();
                if($settings->count()>0) {
                        $data = [];
                        foreach ($settings as $item) {
                                if (!key_exists($item['type'], $data)) {
                                        $new_item = array(
                                                'id' => $item['id'],
                                                'title' => $item['title'],
                                                'value' => $item['value']
                                        );
                                        $data[$item['type']] = $new_item;
                                } else {
                                        $new_item = array(
                                                'id' => $item['id'],
                                                'title' => $item['title'],
                                                'value' => $item['value']
                                        );
                                        array_push($data[$item['type']], $new_item);
                                }

                        }
                        return $data;
                }
                return false;
        }
        public static function slider(){
                $settings = Settings::whereGroup('slider')->orderBy('type')->get();
                if($settings->count()>0) {
                        $data = [];
                        foreach ($settings as $item) {
                                if (!key_exists($item['type'], $data)) {
                                        $new_item = array(
                                                'id' => $item['id'],
                                                'title' => $item['title'],
                                                'value' => $item['value']
                                        );
                                        $data[$item['type']] = $new_item;
                                } else {
                                        $new_item = array(
                                                'id' => $item['id'],
                                                'title' => $item['title'],
                                                'value' => $item['value']
                                        );
                                        array_push($data[$item['type']], $new_item);
                                }

                        }
                        return $data;
                }
                return false;
        }
        public static function about(){
                $settings = Settings::whereGroup('about')->orderBy('type')->get();
                if($settings->count()>0) {
                        $data = [];
                        foreach ($settings as $item) {
                                if (!key_exists($item['type'], $data)) {
                                        $new_item = array(
                                                'id' => $item['id'],
                                                'title' => $item['title'],
                                                'value' => $item['value']
                                        );
                                        $data[$item['type']] = $new_item;
                                } else {
                                        $new_item = array(
                                                'id' => $item['id'],
                                                'title' => $item['title'],
                                                'value' => $item['value']
                                        );
                                        array_push($data[$item['type']], $new_item);
                                }

                        }
                        return $data;
                }
                return false;
        }


        public static function payment(){
                $settings = Settings::whereGroup('payment')->orderBy('type')->get();
                if($settings->count()>0) {
                        $data = [];
                        foreach ($settings as $item) {
                                if (!key_exists($item['type'], $data)) {
                                        $new_item = array(
                                                'id' => $item['id'],
                                                'title' => $item['title'],
                                                'value' => $item['value']
                                        );
                                        $data[$item['type']] = $new_item;
                                } else {
                                        $new_item = array(
                                                'id' => $item['id'],
                                                'title' => $item['title'],
                                                'value' => $item['value']
                                        );
                                        array_push($data[$item['type']], $new_item);
                                }

                        }
                        return $data;
                }
                return false;
        }


}
