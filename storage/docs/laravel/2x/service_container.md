
সার্ভিস কনটেইনার / পরিষেবা ধারক
============

*   [ভূমিকা](https://laravel.com/docs/9.x/container#introduction)
    *   [জিরো কনফিগারেশন রেজোলিউশন](https://laravel.com/docs/9.x/container#zero-configuration-resolution)
    *   [কন্টেইনার কখন ব্যবহার করবেন](https://laravel.com/docs/9.x/container#when-to-use-the-container)
*   [বাঁধাই](https://laravel.com/docs/9.x/container#binding)
    *   [বাইন্ডিং বেসিক](https://laravel.com/docs/9.x/container#binding-basics)
    *   [বাইন্ডিং ইন্টারফেস বাস্তবায়নে](https://laravel.com/docs/9.x/container#binding-interfaces-to-implementations)
    *   [প্রাসঙ্গিক বাঁধাই](https://laravel.com/docs/9.x/container#contextual-binding)
    *   [বাঁধাই আদিম](https://laravel.com/docs/9.x/container#binding-primitives)
    *   [বাঁধাই টাইপ ভ্যারিয়াডিক্স](https://laravel.com/docs/9.x/container#binding-typed-variadics)
    *   [ট্যাগিং](https://laravel.com/docs/9.x/container#tagging)
    *   [বিস্তৃত বাঁধাই](https://laravel.com/docs/9.x/container#extending-bindings)
*   [সমাধান করা](https://laravel.com/docs/9.x/container#resolving)
    *   [মেক মেথড](https://laravel.com/docs/9.x/container#the-make-method)
    *   [স্বয়ংক্রিয় ইনজেকশন](https://laravel.com/docs/9.x/container#automatic-injection)
*   [পদ্ধতি আমন্ত্রণ এবং ইনজেকশন](https://laravel.com/docs/9.x/container#method-invocation-and-injection)
*   [ধারক ইভেন্ট](https://laravel.com/docs/9.x/container#container-events)
*   [PSR-11](https://laravel.com/docs/9.x/container#psr-11)

<a name="introduction"></a>
ভূমিকা
-------------------------------------------------------------

Laravel পরিষেবা কন্টেইনার ক্লাস নির্ভরতা পরিচালনা এবং নির্ভরতা ইনজেকশন সম্পাদন করার জন্য একটি শক্তিশালী হাতিয়ার। নির্ভরতা ইনজেকশন একটি অভিনব বাক্যাংশ যার অর্থ মূলত এই: শ্রেণি নির্ভরতাগুলি কন্সট্রাক্টরের মাধ্যমে বা কিছু ক্ষেত্রে "সেটার" পদ্ধতির মাধ্যমে ক্লাসে "ইনজেকশন" করা হয়।

আসুন একটি সাধারণ উদাহরণ দেখি:
```php
<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Models\User;
 
class UserController extends Controller
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $users;
 
    /**
     * Create a new controller instance.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }
 
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = $this->users->find($id);
 
        return view('user.profile', ['user' => $user]);
    }
}
```
এই উদাহরণে, `UserController`একটি ডেটা উৎস থেকে ব্যবহারকারীদের পুনরুদ্ধার করার প্রয়োজন। সুতরাং, আমরা এমন একটি পরিষেবা **ইনজেক্ট** করব যা ব্যবহারকারীদের পুনরুদ্ধার করতে সক্ষম। এই প্রেক্ষাপটে, ডাটাবেস থেকে ব্যবহারকারীর তথ্য পুনরুদ্ধার করার জন্য আমাদের `UserRepository`সম্ভবত [Eloquent ব্যবহার করে।](https://laravel.com/docs/9.x/eloquent) যাইহোক, যেহেতু রিপোজিটরিটি ইনজেকশন করা হয়েছে, আমরা এটিকে অন্য বাস্তবায়নের মাধ্যমে সহজেই অদলবদল করতে সক্ষম। `UserRepository`এছাড়াও আমরা আমাদের অ্যাপ্লিকেশন পরীক্ষা করার সময় সহজেই "মক" করতে বা একটি ডামি বাস্তবায়ন তৈরি করতে সক্ষম হই ।

একটি শক্তিশালী, বৃহৎ অ্যাপ্লিকেশন তৈরির পাশাপাশি লারাভেল কোরে অবদান রাখার জন্য লারাভেল পরিষেবা কন্টেইনার সম্পর্কে গভীর ধারণা অপরিহার্য।

<a name="zero-configuration-resolution"></a>
## জিরো কনফিগারেশন রেজোলিউশন

যদি একটি ক্লাসের কোন নির্ভরতা না থাকে বা শুধুমাত্র অন্যান্য কংক্রিট ক্লাসের উপর নির্ভর করে (ইন্টারফেস নয়), ধারকটিকে সেই ক্লাসটি কীভাবে সমাধান করা যায় সে সম্পর্কে নির্দেশ দেওয়ার প্রয়োজন নেই। উদাহরণস্বরূপ, আপনি আপনার `routes/web.php`ফাইলে নিম্নলিখিত কোড রাখতে পারেন:
```php
<?php
 
class Service
{
    //
}
 
Route::get('/', function (Service $service) {
    die(get_class($service));
});
```
এই উদাহরণে, আপনার অ্যাপ্লিকেশনের `/`রুটে আঘাত করা স্বয়ংক্রিয়ভাবে `Service`ক্লাসটি সমাধান করবে এবং এটি আপনার রুটের হ্যান্ডলারে ইনজেক্ট করবে। এই খেলা পরিবর্তন. এর অর্থ হল আপনি আপনার অ্যাপ্লিকেশনটি বিকাশ করতে পারেন এবং ফুলে যাওয়া কনফিগারেশন ফাইলগুলির বিষয়ে চিন্তা না করে নির্ভরতা ইনজেকশনের সুবিধা নিতে পারেন।

সৌভাগ্যক্রমে, একটি Laravel অ্যাপ্লিকেশন তৈরি করার সময় আপনি যে ক্লাসগুলি লিখবেন তাদের অনেকগুলি স্বয়ংক্রিয়ভাবে কন্টেইনারের মাধ্যমে তাদের নির্ভরতা গ্রহণ করবে, যার মধ্যে [কন্ট্রোলার](https://laravel.com/docs/9.x/controllers) , [ইভেন্ট লিসেনার](https://laravel.com/docs/9.x/events) , [মিডলওয়্যার](https://laravel.com/docs/9.x/middleware) এবং আরও অনেক কিছু রয়েছে। [উপরন্তু, আপনি সারিবদ্ধ কাজের](https://laravel.com/docs/9.x/queues)`handle` পদ্ধতিতে ইঙ্গিত নির্ভরতা টাইপ করতে পারেন । একবার আপনি স্বয়ংক্রিয় এবং শূন্য কনফিগারেশন নির্ভরতা ইনজেকশনের শক্তির স্বাদ পেলে এটি ছাড়া বিকাশ করা অসম্ভব বলে মনে হয়।[](https://laravel.com/docs/9.x/queues)

<a name="when-to-use-the-container"></a>
## কন্টেইনার কখন ব্যবহার করবেন

শূন্য কনফিগারেশন রেজোলিউশনের জন্য ধন্যবাদ, আপনি প্রায়শই কন্টেইনারের সাথে ম্যানুয়ালি ইন্টারঅ্যাক্ট না করেই রুট, কন্ট্রোলার, ইভেন্ট শ্রোতা এবং অন্য কোথাও নির্ভরতা টাইপ করবেন। উদাহরণস্বরূপ, আপনি `Illuminate\Http\Request`আপনার রুট সংজ্ঞাতে অবজেক্টটি টাইপ-ইঙ্গিত করতে পারেন যাতে আপনি বর্তমান অনুরোধটি সহজেই অ্যাক্সেস করতে পারেন। যদিও এই কোডটি লেখার জন্য আমাদের কখনই ধারকটির সাথে যোগাযোগ করতে হবে না, এটি পর্দার পিছনে এই নির্ভরতাগুলির ইনজেকশন পরিচালনা করছে:
```php
use Illuminate\Http\Request;
 
Route::get('/', function (Request $request) {
    // ...
});
```
অনেক ক্ষেত্রে, স্বয়ংক্রিয় নির্ভরতা ইনজেকশন এবং [সম্মুখভাগের জন্য ধন্যবাদ, আপনি কন্টেইনার থেকে](https://laravel.com/docs/9.x/facades) **কখনও** ম্যানুয়ালি বাঁধাই বা সমাধান না করে লারাভেল অ্যাপ্লিকেশন তৈরি করতে পারেন । **সুতরাং, আপনি কখন ম্যানুয়ালি কন্টেইনারের সাথে ইন্টারঅ্যাক্ট করবেন?** আসুন দুটি পরিস্থিতি পরীক্ষা করা যাক।

প্রথমত, আপনি যদি একটি ক্লাস লেখেন যা একটি ইন্টারফেস প্রয়োগ করে এবং আপনি একটি রুট বা ক্লাস কনস্ট্রাক্টরে সেই ইন্টারফেসটি টাইপ-ইঙ্গিত করতে চান, তাহলে আপনাকে অবশ্যই [কন্টেইনারকে বলতে হবে কিভাবে সেই ইন্টারফেসটি সমাধান করতে হবে](https://laravel.com/docs/9.x/container#binding-interfaces-to-implementations) । দ্বিতীয়ত, আপনি যদি [একটি Laravel প্যাকেজ লিখছেন](https://laravel.com/docs/9.x/packages) যা আপনি অন্যান্য Laravel বিকাশকারীদের সাথে ভাগ করার পরিকল্পনা করছেন, তাহলে আপনাকে আপনার প্যাকেজের পরিষেবাগুলিকে কন্টেইনারে আবদ্ধ করতে হতে পারে।

<a name="binding"></a>
## বাঁধাই
--------------------------------------------------------

<a name="binding-basics"></a>
## বাইন্ডিং বেসিক

<a name="simple-bindings"></a>
## সরল বাইন্ডিং

আপনার প্রায় সমস্ত পরিষেবা কন্টেইনার বাইন্ডিং [পরিষেবা প্রদানকারীদের](https://laravel.com/docs/9.x/providers) মধ্যে নিবন্ধিত হবে , তাই এই উদাহরণগুলির অধিকাংশই সেই প্রসঙ্গে কন্টেইনার ব্যবহার করে প্রদর্শন করবে৷

`$this->app`একটি পরিষেবা প্রদানকারীর মধ্যে, আপনি সর্বদা সম্পত্তির মাধ্যমে কন্টেইনারে অ্যাক্সেস করতে পারেন । আমরা পদ্ধতিটি ব্যবহার করে একটি বাইন্ডিং নিবন্ধন করতে পারি `bind`, ক্লাস বা ইন্টারফেসের নাম পাস করে যেটি ক্লাসের একটি উদাহরণ প্রদান করে এমন একটি বন্ধের সাথে আমরা নিবন্ধন করতে চাই:
```php
use App\Services\Transistor;
use App\Services\PodcastParser;
 
$this->app->bind(Transistor::class, function ($app) {
    return new Transistor($app->make(PodcastParser::class));
});
```
মনে রাখবেন যে আমরা ধারকটি নিজেই সমাধানকারীর কাছে একটি যুক্তি হিসাবে পেয়েছি। তারপরে আমরা যে অবজেক্টটি তৈরি করছি তার উপ-নির্ভরতাগুলি সমাধান করতে কন্টেইনারটি ব্যবহার করতে পারি।

উল্লিখিত হিসাবে, আপনি সাধারণত পরিষেবা প্রদানকারীদের মধ্যে কন্টেইনারের সাথে যোগাযোগ করবেন; `App` [যাইহোক, যদি আপনি একটি পরিষেবা প্রদানকারীর বাইরের](https://laravel.com/docs/9.x/facades) ধারকটির সাথে যোগাযোগ করতে চান, তাহলে আপনি সম্মুখের মাধ্যমে তা করতে পারেন :

```php
    use App\Services\Transistor;
use Illuminate\Support\Facades\App;
 
App::bind(Transistor::class, function ($app) {
    // ...
});
```

>{warning.fa fa-laptop} কোন ইন্টারফেসের উপর নির্ভর না করলে কন্টেইনারে ক্লাস বাঁধার দরকার নেই। ধারকটিকে এই বস্তুগুলি কীভাবে তৈরি করা যায় সে সম্পর্কে নির্দেশ দেওয়ার দরকার নেই, কারণ এটি প্রতিফলন ব্যবহার করে স্বয়ংক্রিয়ভাবে এই বস্তুগুলি সমাধান করতে পারে।


<a name="binding-a-singleton"></a>
## [একটি সিঙ্গেলটন বাঁধাই](https://laravel.com/docs/9.x/container#binding-a-singleton)

পদ্ধতিটি `singleton`একটি শ্রেণী বা ইন্টারফেসকে পাত্রে আবদ্ধ করে যা শুধুমাত্র একবার সমাধান করা উচিত। একবার একটি সিঙ্গলটন বাইন্ডিং সমাধান হয়ে গেলে, একই বস্তুর উদাহরণ কন্টেইনারে পরবর্তী কলগুলিতে ফেরত দেওয়া হবে:
```php
use App\Services\Transistor;
use App\Services\PodcastParser;
 
$this->app->singleton(Transistor::class, function ($app) {
    return new Transistor($app->make(PodcastParser::class));
});
```
<a name="binding-scoped"></a>
## বাইন্ডিং স্কোপড সিঙ্গেলটন

পদ্ধতিটি `scoped`একটি শ্রেণী বা ইন্টারফেসকে কন্টেইনারে আবদ্ধ করে যা শুধুমাত্র একটি প্রদত্ত লারাভেল অনুরোধ/চাকরীর জীবনচক্রের মধ্যে একবার সমাধান করা উচিত। যদিও এই পদ্ধতিটি পদ্ধতির অনুরূপ, `singleton`পদ্ধতিটি ব্যবহার করে নিবন্ধিত দৃষ্টান্তগুলি `scoped`যখনই লারাভেল অ্যাপ্লিকেশন একটি নতুন "লাইফসাইকেল" শুরু করে, যেমন যখন একটি [লারাভেল অক্টেন](https://laravel.com/docs/9.x/octane) কর্মী একটি নতুন অনুরোধ প্রক্রিয়া করে বা যখন একটি লারাভেল [সারি কর্মী](https://laravel.com/docs/9.x/queues) একটি নতুন কাজ প্রক্রিয়া করে:
```php
use App\Services\Transistor;
use App\Services\PodcastParser;
 
$this->app->scoped(Transistor::class, function ($app) {
    return new Transistor($app->make(PodcastParser::class));
});
```
<a name="binding-instances"></a>
## [বাঁধাই দৃষ্টান্ত](https://laravel.com/docs/9.x/container#binding-instances)

`instance` আপনি পদ্ধতিটি ব্যবহার করে একটি বিদ্যমান বস্তুর দৃষ্টান্তকে ধারকটিতে আবদ্ধ করতে পারেন । প্রদত্ত উদাহরণটি সর্বদা পরবর্তী কলগুলিতে কন্টেইনারে ফেরত দেওয়া হবে:
```php
use App\Services\Transistor;
use App\Services\PodcastParser;
 
$service = new Transistor(new PodcastParser);
 
$this->app->instance(Transistor::class, $service);
```
<a name="binding-interfaces-to-implementations"></a>
## বাইন্ডিং ইন্টারফেস বাস্তবায়নে

পরিষেবা ধারকটির একটি খুব শক্তিশালী বৈশিষ্ট্য হল একটি প্রদত্ত বাস্তবায়নের সাথে একটি ইন্টারফেস আবদ্ধ করার ক্ষমতা। উদাহরণস্বরূপ, ধরা যাক আমাদের একটি `EventPusher`ইন্টারফেস এবং একটি `RedisEventPusher`বাস্তবায়ন আছে। একবার আমরা `RedisEventPusher`এই ইন্টারফেসের আমাদের বাস্তবায়ন কোডিং করে নিলে, আমরা এটিকে পরিষেবা কন্টেইনারের সাথে নিবন্ধন করতে পারি:
```php
use App\Contracts\EventPusher;
use App\Services\RedisEventPusher;
 
$this->app->bind(EventPusher::class, RedisEventPusher::class);
```
এই বিবৃতিটি কন্টেইনারকে বলে যে `RedisEventPusher`যখন একটি শ্রেণির বাস্তবায়নের প্রয়োজন হয় তখন এটি ইনজেক্ট করা উচিত `EventPusher`। `EventPusher`এখন আমরা কন্টেইনার দ্বারা সমাধান করা ক্লাসের কনস্ট্রাক্টরে ইন্টারফেসটি টাইপ-ইঙ্গিত করতে পারি । মনে রাখবেন, লারাভেল অ্যাপ্লিকেশনের মধ্যে কন্ট্রোলার, ইভেন্ট শ্রোতা, মিডলওয়্যার এবং অন্যান্য বিভিন্ন ধরণের ক্লাস সবসময় কন্টেইনার ব্যবহার করে সমাধান করা হয়:
```php
use App\Contracts\EventPusher;
 
/**
 * Create a new class instance.
 *
 * @param  \App\Contracts\EventPusher  $pusher
 * @return void
 */
public function __construct(EventPusher $pusher)
{
    $this->pusher = $pusher;
}
```
<a name="contextual-binding"></a>
## প্রাসঙ্গিক বাঁধাই

কখনও কখনও আপনার দুটি ক্লাস থাকতে পারে যা একই ইন্টারফেস ব্যবহার করে, তবে আপনি প্রতিটি ক্লাসে বিভিন্ন বাস্তবায়ন ইনজেক্ট করতে চান। উদাহরণস্বরূপ, দুটি নিয়ন্ত্রক `Illuminate\Contracts\Filesystem\Filesystem` [চুক্তির](https://laravel.com/docs/9.x/contracts) বিভিন্ন বাস্তবায়নের উপর নির্ভর করতে পারে । Laravel এই আচরণ সংজ্ঞায়িত করার জন্য একটি সহজ, সাবলীল ইন্টারফেস প্রদান করে:
```php
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\VideoController;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
 
$this->app->when(PhotoController::class)
          ->needs(Filesystem::class)
          ->give(function () {
              return Storage::disk('local');
          });
 
$this->app->when([VideoController::class, UploadController::class])
          ->needs(Filesystem::class)
          ->give(function () {
              return Storage::disk('s3');
          });
```
<a name="binding-primitives"></a>
## বাঁধাই আদিম

কখনও কখনও আপনার এমন একটি শ্রেণী থাকতে পারে যা কিছু ইনজেক্টেড ক্লাস গ্রহণ করে, তবে একটি পূর্ণসংখ্যার মতো একটি ইনজেকশন করা আদিম মানও প্রয়োজন। আপনার ক্লাসের প্রয়োজন হতে পারে এমন যেকোনো মান ইনজেক্ট করতে আপনি সহজেই প্রাসঙ্গিক বাঁধাই ব্যবহার করতে পারেন:
```php
use App\Http\Controllers\UserController;
 
$this->app->when(UserController::class)
          ->needs('$variableName')
          ->give($value);
```
[কখনও কখনও একটি ক্লাস ট্যাগ](https://laravel.com/docs/9.x/container#tagging) করা উদাহরণগুলির একটি অ্যারের উপর নির্ভর করতে পারে । পদ্ধতিটি ব্যবহার করে `giveTagged`, আপনি সহজেই সেই ট্যাগের সাথে সমস্ত কন্টেইনার বাইন্ডিং ইনজেকশন করতে পারেন:
```php
$this->app->when(ReportAggregator::class)
    ->needs('$reports')
    ->giveTagged('reports');
```
আপনি যদি আপনার অ্যাপ্লিকেশনের কনফিগারেশন ফাইলগুলির একটি থেকে একটি মান ইনজেক্ট করতে চান তবে আপনি `giveConfig`পদ্ধতিটি ব্যবহার করতে পারেন:

```php
$this->app->when(ReportAggregator::class)
    ->needs('$timezone')
    ->giveConfig('app.timezone');
```

<a name="binding-typed-variadics"></a>
## বাঁধাই টাইপ ভ্যারিয়াডিক্স

মাঝে মাঝে, আপনার এমন একটি ক্লাস থাকতে পারে যা একটি বৈচিত্র্যময় কনস্ট্রাক্টর আর্গুমেন্ট ব্যবহার করে টাইপ করা বস্তুর একটি অ্যারে গ্রহণ করে:

```php
<?php
 
use App\Models\Filter;
use App\Services\Logger;
 
class Firewall
{
    /**
     * The logger instance.
     *
     * @var \App\Services\Logger
     */
    protected $logger;
 
    /**
     * The filter instances.
     *
     * @var array
     */
    protected $filters;
 
    /**
     * Create a new class instance.
     *
     * @param  \App\Services\Logger  $logger
     * @param  array  $filters
     * @return void
     */
    public function __construct(Logger $logger, Filter ...$filters)
    {
        $this->logger = $logger;
        $this->filters = $filters;
    }
}
```

প্রাসঙ্গিক বাইন্ডিং ব্যবহার করে, আপনি একটি ক্লোজার পদ্ধতি প্রদান করে এই নির্ভরতা সমাধান করতে পারেন যা সমাধান করা দৃষ্টান্তগুলির `give`একটি অ্যারে প্রদান করে :`Filter`

```php
$this->app->when(Firewall::class)
          ->needs(Filter::class)
          ->give(function ($app) {
                return [
                    $app->make(NullFilter::class),
                    $app->make(ProfanityFilter::class),
                    $app->make(TooLongFilter::class),
                ];
          });
```

সুবিধার জন্য, যখনই দৃষ্টান্তের `Firewall`প্রয়োজন হয় তখন আপনি কন্টেইনার দ্বারা সমাধান করার জন্য ক্লাস নামের একটি অ্যারে প্রদান করতে পারেন :`Filter`

```php
$this->app->when(Firewall::class)
          ->needs(Filter::class)
          ->give([
              NullFilter::class,
              ProfanityFilter::class,
              TooLongFilter::class,
          ]);
```

<a name="variadic-tag-dependencies"></a>
## বৈচিত্র্যময় ট্যাগ নির্ভরতা

`Report ...$reports`কখনও কখনও একটি শ্রেণীর একটি বৈচিত্র্যময় নির্ভরতা থাকতে পারে যা একটি প্রদত্ত শ্রেণি ( ) হিসাবে টাইপ-ইঙ্গিত হয় । `needs`এবং পদ্ধতিগুলি ব্যবহার করে , আপনি প্রদত্ত নির্ভরতার জন্য সেই [ট্যাগের](https://laravel.com/docs/9.x/container#tagging)`giveTagged` সাথে সমস্ত কন্টেইনার বাইন্ডিং সহজেই ইনজেক্ট করতে পারেন :[](https://laravel.com/docs/9.x/container#tagging)
```php
$this->app->when(ReportAggregator::class)
    ->needs(Report::class)
    ->giveTagged('reports');
```
<a name="tagging"></a>
## ট্যাগিং

মাঝে মাঝে, আপনাকে বাঁধাইয়ের একটি নির্দিষ্ট "বিভাগ" সব সমাধান করতে হতে পারে। উদাহরণস্বরূপ, সম্ভবত আপনি একটি প্রতিবেদন বিশ্লেষক তৈরি করছেন যা বিভিন্ন `Report`ইন্টারফেস বাস্তবায়নের একটি অ্যারে গ্রহণ করে। বাস্তবায়ন নিবন্ধন করার পরে `Report`, আপনি পদ্ধতি ব্যবহার করে তাদের একটি ট্যাগ বরাদ্দ করতে পারেন `tag`:
```php
$this->app->bind(CpuReport::class, function () {
    //
});
 
$this->app->bind(MemoryReport::class, function () {
    //
});
 
$this->app->tag([CpuReport::class, MemoryReport::class], 'reports');
```

`tagged`পরিষেবাগুলি ট্যাগ হয়ে গেলে, আপনি সহজেই কন্টেইনার পদ্ধতির মাধ্যমে সেগুলি সমাধান করতে পারেন :

```php
$this->app->bind(ReportAnalyzer::class, function ($app) {
    return new ReportAnalyzer($app->tagged('reports'));
});
```

<a name="extending-bindings"></a>
## বিস্তৃত বাঁধাই

পদ্ধতিটি `extend`সমাধানকৃত পরিষেবাগুলির পরিবর্তনের অনুমতি দেয়। উদাহরণস্বরূপ, যখন একটি পরিষেবা সমাধান করা হয়, আপনি পরিষেবাটি সাজাতে বা কনফিগার করতে অতিরিক্ত কোড চালাতে পারেন৷ পদ্ধতিটি `extend`দুটি আর্গুমেন্ট গ্রহণ করে, আপনি যে পরিষেবা শ্রেণীটি প্রসারিত করছেন এবং একটি বন্ধ যা পরিবর্তিত পরিষেবাটি ফিরিয়ে দিতে হবে। ক্লোজারটি সমাধান করা পরিষেবা এবং কন্টেইনার উদাহরণটি গ্রহণ করে:
```php
$this->app->extend(Service::class, function ($service, $app) {
    return new DecoratedService($service);
});
```

<a name="resolving"></a>
## সমাধান করা
--------------------------------------------------------------

<a name="the-make-method"></a>
### `make`পদ্ধতি \_

আপনি `make`ধারক থেকে একটি ক্লাস উদাহরণ সমাধান করতে পদ্ধতি ব্যবহার করতে পারেন। পদ্ধতিটি `make`ক্লাস বা ইন্টারফেসের নাম গ্রহণ করে যা আপনি সমাধান করতে চান:
```php
use App\Services\Transistor;
 
$transistor = $this->app->make(Transistor::class);
```
যদি আপনার ক্লাসের কিছু নির্ভরতা কন্টেইনারের মাধ্যমে সমাধানযোগ্য না হয়, তাহলে আপনি সেগুলিকে একটি সহযোগী অ্যারে হিসাবে `makeWith`পদ্ধতিতে পাস করে ইনজেকশন দিতে পারেন। উদাহরণস্বরূপ, আমরা ম্যানুয়ালি পরিষেবার `$id`জন্য প্রয়োজনীয় কনস্ট্রাক্টর আর্গুমেন্ট পাস করতে পারি `Transistor`:

```php
use App\Services\Transistor;
 
$transistor = $this->app->makeWith(Transistor::class, ['id' => 1]);
```

আপনি যদি আপনার কোডের এমন একটি অবস্থানে পরিষেবা প্রদানকারীর বাইরে থাকেন যেখানে `$app`ভেরিয়েবলের অ্যাক্সেস নেই, তাহলে আপনি কন্টেইনার থেকে একটি ক্লাসের উদাহরণ সমাধান করতে `App` [সম্মুখভাগ ব্যবহার করতে পারেন:](https://laravel.com/docs/9.x/facades)

```php
use App\Services\Transistor;
use Illuminate\Support\Facades\App;
 
$transistor = App::make(Transistor::class);
```

আপনি যদি লারাভেল কন্টেইনার ইনস্ট্যান্সটি নিজেই একটি ক্লাসে ইনজেকশন করতে চান যা কন্টেইনার দ্বারা সমাধান করা হচ্ছে, আপনি `Illuminate\Container\Container`আপনার ক্লাসের কনস্ট্রাক্টরে ক্লাসটি টাইপ-ইঙ্গিত করতে পারেন:

```php
use Illuminate\Container\Container;
 
/**
 * Create a new class instance.
 *
 * @param  \Illuminate\Container\Container  $container
 * @return void
 */
public function __construct(Container $container)
{
    $this->container = $container;
}
```

<a name="automatic-injection"></a>
## স্বয়ংক্রিয় ইনজেকশন

বিকল্পভাবে, এবং গুরুত্বপূর্ণভাবে, আপনি কন্টেইনার , [ইভেন্ট লিসেনার](https://laravel.com/docs/9.x/events) , [মিডলওয়্যার](https://laravel.com/docs/9.x/controllers) এবং আরও অনেক কিছু [সহ](https://laravel.com/docs/9.x/middleware) কন্টেইনার দ্বারা সমাধান করা একটি ক্লাসের কনস্ট্রাক্টরে নির্ভরতা টাইপ-ইঙ্গিত দিতে পারেন । [উপরন্তু, আপনি সারিবদ্ধ কাজের](https://laravel.com/docs/9.x/queues) পদ্ধতিতে ইঙ্গিত নির্ভরতা টাইপ করতে পারেন । অনুশীলনে, এইভাবে আপনার বেশিরভাগ বস্তুর ধারক দ্বারা সমাধান করা উচিত।[](https://laravel.com/docs/9.x/events)[](https://laravel.com/docs/9.x/middleware)`handle`[](https://laravel.com/docs/9.x/queues)

উদাহরণস্বরূপ, আপনি একটি কন্ট্রোলারের কনস্ট্রাক্টরে আপনার অ্যাপ্লিকেশন দ্বারা সংজ্ঞায়িত একটি সংগ্রহস্থল টাইপ-ইঙ্গিত করতে পারেন। সংগ্রহস্থলটি স্বয়ংক্রিয়ভাবে সমাধান করা হবে এবং ক্লাসে ইনজেকশন দেওয়া হবে:

```php
<?php
 
namespace App\Http\Controllers;
 
use App\Repositories\UserRepository;
 
class UserController extends Controller
{
    /**
     * The user repository instance.
     *
     * @var \App\Repositories\UserRepository
     */
    protected $users;
 
    /**
     * Create a new controller instance.
     *
     * @param  \App\Repositories\UserRepository  $users
     * @return void
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }
 
    /**
     * Show the user with the given ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
}
```
<a name="method-invocation-and-injection"></a>
## পদ্ধতি আমন্ত্রণ এবং ইনজেকশন
-----------------------------------------------------------------------------------------------------

কখনও কখনও আপনি একটি বস্তুর উদাহরণে একটি পদ্ধতি চালু করতে ইচ্ছুক হতে পারেন যখন ধারকটিকে সেই পদ্ধতির নির্ভরতা স্বয়ংক্রিয়ভাবে ইনজেক্ট করার অনুমতি দেয়। উদাহরণস্বরূপ, নিম্নলিখিত ক্লাস দেওয়া:

```php
<?php
 
namespace App;
 
use App\Repositories\UserRepository;
 
class UserReport
{
    /**
     * Generate a new user report.
     *
     * @param  \App\Repositories\UserRepository  $repository
     * @return array
     */
    public function generate(UserRepository $repository)
    {
        // ...
    }
}
```

`generate`আপনি এই মত ধারক মাধ্যমে পদ্ধতি আহ্বান করতে পারেন:

```php
use App\UserReport;
use Illuminate\Support\Facades\App;
 
$report = App::call([new UserReport, 'generate']);
```

`call`পদ্ধতি যেকোনো পিএইচপি কলযোগ্য গ্রহণ করে । ধারকটির `call`পদ্ধতিটি এমনকি স্বয়ংক্রিয়ভাবে তার নির্ভরতাগুলি ইনজেকশন করার সময় একটি বন্ধ করার জন্য ব্যবহার করা যেতে পারে:

```php
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\App;
 
$result = App::call(function (UserRepository $repository) {
    // ...
});
```

<a name="container-events"></a>
## ধারক ইভেন্ট
----------------------------------------------------------------------

পরিষেবা কন্টেইনার প্রতিবার এটি একটি বস্তুর সমাধান করার সময় একটি ইভেন্ট ফায়ার করে। আপনি পদ্ধতিটি ব্যবহার করে এই ইভেন্টটি শুনতে পারেন `resolving`:

```php
use App\Services\Transistor;
 
$this->app->resolving(Transistor::class, function ($transistor, $app) {
    // Called when container resolves objects of type "Transistor"...
});
 
$this->app->resolving(function ($object, $app) {
    // Called when container resolves object of any type...
});
```

আপনি দেখতে পাচ্ছেন, যে বস্তুটি সমাধান করা হচ্ছে সেটি কলব্যাকে পাঠানো হবে, যার ফলে আপনি বস্তুটির গ্রাহককে দেওয়ার আগে সেটিতে কোনো অতিরিক্ত বৈশিষ্ট্য সেট করতে পারবেন।

<a name="psr-11"></a>
## PSR-11
-------------------------------------------------------

লারাভেলের সার্ভিস কন্টেইনার [PSR-11](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-11-container.md) ইন্টারফেস প্রয়োগ করে। অতএব, আপনি লারাভেল কন্টেইনারের একটি উদাহরণ পেতে PSR-11 কন্টেইনার ইন্টারফেস টাইপ-ইঙ্গিত করতে পারেন:

```php
use App\Services\Transistor;
use Psr\Container\ContainerInterface;
 
Route::get('/', function (ContainerInterface $container) {
    $service = $container->get(Transistor::class);
 
    //
});
```

প্রদত্ত শনাক্তকারীর সমাধান করা না গেলে একটি ব্যতিক্রম নিক্ষেপ করা হয়। ব্যতিক্রমটি একটি উদাহরণ হবে `Psr\Container\NotFoundExceptionInterface`যদি সনাক্তকারী কখনই আবদ্ধ ছিল না। যদি শনাক্তকারী আবদ্ধ ছিল কিন্তু সমাধান করা যায়নি, তাহলে একটি উদাহরণ `Psr\Container\ContainerExceptionInterface`নিক্ষেপ করা হবে।
