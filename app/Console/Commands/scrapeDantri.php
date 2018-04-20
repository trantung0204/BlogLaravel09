<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \Goutte;
use App\Post;
use App\Category;

class scrapeDantri extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:dantri';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    
    protected $categories=[
        [
            'link'=>'xa-hoi.htm',
            'slug'=>'xa-hoi',
        ],
        [
            'link'=>'the-gioi.htm',
            'slug'=>'the-gioi',
        ],
        [
            'link'=>'the-thao.htm',
            'slug'=>'the-thao',
        ],
        // [
        //     'link'=>'giao-duc-khuyen-hoc.htm',
        //     'slug'=>'giao-duc-khuyen-hoc',
        // ],
        [
            'link'=>'kinh-doanh.htm',
            'slug'=>'kinh-doanh',
        ],
        [
            'link'=>'suc-khoe.htm',
            'slug'=>'suc-khoe',
        ],
        [
            'link'=>'suc-manh-so.htm',
            'slug'=>'suc-manh-so',
        ],
        [
            'link'=>'van-hoa.htm',
            'slug'=>'van-hoa',
        ],
        [
            'link'=>'phap-luat.htm',
            'slug'=>'phap-luat',
        ],
    ];
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach ($this->categories as $category) {
            $link=env("DAN_TRI").'/'.$category['link'];
            print($link."\n");
            $category_id = Category::where('slug', '=',$category['slug'])->first();
            if(!isset($category_id)){
                $category_id=1;
            }
            $crawler = Goutte::request('GET', $link);
            $linkPost=$crawler->filter('a.fon6')->each(function ($node) {
              return  $node->attr('href');
            });
            foreach ($linkPost as $link) {
                $l=env("DAN_TRI").$link;
                print($l."\n");
                self::scrapPost($l,$category_id->id);
            }
        }
    }

    public static function scrapPost($url,$category_id){
        $data = array();
        $crawler = Goutte::request('GET', $url);
        $title=$crawler->filter('h1.fon31.mgb15')->each(function ($node) {
          return $node->text();
        });
        if(isset($title[0])){
            $title=$title[0];
        }
        $slug=str_slug($title);
        $description=$crawler->filter('h2.fon33.mt1.sapo')->each(function ($node) {
          return str_replace('Dân trí','',$node->text());
        });
        if(isset($description[0])){
            $description=$description[0];
        }
        $content=$crawler->filter('div#divNewsContent.detail-content')->each(function ($node) {
            $content = str_replace('Dân trí','',$node->html());
            return  $content;
        });
        if(isset($content[0])){
            $content=$content[0];
        }
        $thumbnail=$crawler->filter('div#divNewsContent.detail-content .VCSortableInPreviewMode img')->each(function ($node) {
          return  $node->attr('src');
        });
        if(isset($thumbnail[0])){
            $thumbnail=$thumbnail[0];
        }
        $data=[
            'title' => $title,
            'thumbnail' => $thumbnail,
            'slug' => $slug,
            'description' => $description,
            'content' => $content,
            'user_id' => 5,
            'category_id' => $category_id,
        ];
        $p=Post::where('slug',$data['slug'])->first();
        if (!isset($p)) {
            Post::create($data);
        }else{
            print('next \n');
        }
        // print($title."\n");
        // print($thumbnail."\n");
        // print($slug."\n");
        // print($description."\n");
        //print($content."\n");
        //print($user_id."\n");
        //print($category_id."\n");
    }
}
