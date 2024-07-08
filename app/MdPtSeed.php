<?php

use App\Models\Post;
use Closure;
use Illuminate\Database\Eloquent\Model;
use Exception;

class MdPtSeed
{
    /**
     * Run the database seeds.
     */
    private string $post;
    private string $media;
    private string $media_post;
    private int $CountPost = 0;
    private int $CountMedia = 0;
    private int $minMedia_Post = 0;
    private int $maxMedia_Post = 3;


    private ?Closure $pivotCallback = null;

    private function __construct($post, $media, $media_post)
    {
        $this->post = $post;
        $this->media = $media;
        $this->media_post = $media_post;
    }

    /**
     * @throws Exception
     */
    private static function checkIfIsModel($Post): void
    {
        if (!is_subclass_of($Post, Post::class)) {
            throw new Exception("the $Post must be a Model");
        }
    }

    public static function make(string $post , string $media , string $media_post) : MdPtSeed
    {
        self::checkIfIsModel($post);
        self::checkIfIsModel($media);

        return new MdPtSeed($post , $media, $media_post);
    }

    private function checkIfLessThanZero(int $count): void
    {
        if ($count < 0) {
            throw new Exception('the count must be equal or greater than 0');
        }
    }

    public function withFactory(int $CountOfPost, int $countOfmedia): MdPtSeed
    {
        $this->checkIfLessThanZero($CountOfPost);
        $this->checkIfLessThanZero($countOfmedia);

        $this->CountPost = $CountOfPost;
        $this->CountMedia = $countOfmedia;

        return $this;
    }

    public function minRelation(int $count): MdPtSeed
    {
        $this->checkIfLessThanZero($count);
        $this->minMedia_Post = $count;
        return $this;
    }

    public function maxRelation(int $count): MdPtSeed
    {
        $this->checkIfLessThanZero($count);
        $this->maxMedia_Post = $count;
        return $this;
    }

    public function rangeRelation(int $min, int $max): MdPtSeed
    {
        $this->minRelation($min);
        $this->maxRelation($max);
        return $this;
    }

    private function checkCallback($callback): void
    {
        if(!is_callable($callback)){
            throw new Exception('the argument must be a callback');
        }
        if(!is_array($callback())){
            throw new Exception('the callback must return an array');
        }
    }

    public function withPivot($callback): MdPtSeed
    {
        $this->checkCallback($callback);
        $this->pivotCallback = $callback;
        return $this;
    }

    private function factory(): void
    {
        if ($this->CountPost > 0) {
            logger($this->post);
            $this->post::factory($this->CountPost)->create();
        }

        if ($this->CountMedia > 0) {
            $this->media::factory($this->CountMedia)->create();
        }
    }

    private function getRandomArray($array, $count): array{
        $arrayKeys = array_rand($array, $count);
        $randomArray = [];
        if(!is_array($arrayKeys)){
            $randomArray[] = $array[$arrayKeys];
        }else {
            foreach ($arrayKeys as $item) {
                $randomArray[] = $array[$item];
            }
        }

        return $randomArray;
    }


    private function addPivot($array): array{
        $attachedWithPivot = [];
        $callback = $this->pivotCallback;
        if($callback){
            foreach ($array as $value){
                $attachedWithPivot[$value] = $callback();
            }
        }else{
            $attachedWithPivot = $array;
        }
        return $attachedWithPivot;
    }

    private function getAttachedArray($ids)
    {

        $randomNumber = rand($this->minMedia_Post, $this->maxMedia_Post);
        if($randomNumber == 0){
            return null;
        }
        $attachedArray = $this->getRandomArray($ids, $randomNumber);
        return $this->addPivot($attachedArray);
    }

    private function checkBeforeRun(): void{
        if($this->minMedia_Post > $this->maxMedia_Post){
            throw new Exception('minimum relation must be less than maximum relation');
        }
        $countSecond = $this->media::count() + $this->CountMedia;
        if($this->maxMedia_Post > $countSecond){
            throw new Exception("maximum relation must be less than or equal $this->media count");
        }
    }
    public function run(): void
    {
        $this->checkBeforeRun();
        $this->factory();
        $posts = $this->post::all();
        $media_Post = $this->media_post;
        $id = $this->media::select('id')->get()->pluck('id')->to_array();

        foreach ($posts as $post){
            $attached = $this->getAttachedArray($id);
            if(! $attached) continue;
            $post->$media_Post()->attach($attached);
        }
    }
}
