# Technical Test Docs
A combination of Laravel and AWS services in order to test my ability to link different technologies and tools together

**Note before we get started**
In order not to waste anyone's time I need to mention from now that I was not able to solve the test as guided. What I mean by that is that I was not able to use the LAMBDA function to perform the validation, store the db records and return error messages to the front-end. If this is not acceptable then you can stop reading and I thank you for your consideration. Having said that and assuming you are still reading I did do the validation the Laravel way since I was not able to do it the AWS way.

**Project Link**
http://testapp-env.eba-tj2brtt5.eu-west-2.elasticbeanstalk.com/

## The requirements
● Please keep notes as you go along and submit them with your solution [✓ - This read me file will be that together with comments in the code]
● Please do not use any pre-built templates although the use of any framework is allowed [✓ - Was considering between a pure PHP or the use of Laravel but at the end I think I will go with Laravel since that is what is being used in Artscapy]
● Please take your time and ask questions if unsure [✓ - Was a bit confused regarding the extra rules and to be exact `should validate the data fields but not reject data if it is wrong`. I assumed this meant store records in the DB even if they are invalid but after some clarification I realized this means simply validate the data (ideally both client(jQuery?) and server side(Laravel but in this case LAMBDA))]


### First things first
The first thing I did was to create a new git repository where I will store all my code and can share with Philip. Then I sat down to think how I will go through with this. I personally never used AWS neither for personal projects (used Firebase) nor commercially (we have our won servers). So I actually did a little research on AWS and Lambda. AWS seem somewhat straight forward, I can create a DB and link it to my Laravel project through the .env file should have no problems there and should be able to launch my Laravel app on AWS Lambda but will for sure need to read on this more. Especially on LAMBDA functions which do not support PHP.. probably gonna go with JS but not sure. I am sure the actual Laravel part of the test is a piece of cake. The 'fun' part is AWS integration :D

## Part One - Laravel

### Design though process
After deciding roughly how things are going to be implemented on the above paragraph it was time for a little application design. I did a rough sketch of what I want the project to look like. After this it was time to set up a new Laravel project! Using Composer I created a new Laravel 9 project in my git directory

```
composer create-project laravel/laravel AWS-Project
```

and then we can launch our project locally using php artisan

```
php artisan serve
```

Just like that our Laravel Project is up and running and now it's time to create the Models, Views, Controllers and Routes.

### MVC design
I started by creating another DB table art_piece. The idea is that a user can have many art_pieces but an art piece belongs to a user. Not sure if I will end up using said table but for the time being it doesn't hurt to have it.

```
php artisan make:migration create_art_piece_table
```

And then I proceeded to create the rest of the files I needed (# Generate a model, ArtPieceController resource class, and form request classes...)

```
php artisan make:model ArtPiece -crR
```

Update the eloquent relationship in case we use them

```
*** ArtPiece Model***
public function user()
{
    return $this->belongsTo(User::class);
}

*** User Model***
public function artPieces()
{
    return $this->hasMany(ArtPiece::class);
}
```

Create the basic controller functions like Index, Edit, Destroy, Create e.t.c. and view files plus their content (tables, forms etc) and routes. I am of course skipping some steps like Factory classes and seeders among other stuff to save some time.

```
Route::resource("/art", ArtPieceController::class);
```

### Issue 1
***
At this point I was ready to run my migrations on my local environment for testing (WAMP) but for some odd reason i was getting the error that the drivers don't exist. I thought that was weird as I had a bunch of other projects running Laravel and i had no problems with my drivers. Looking into it I did everything I could find on this, went into php.ini files (both WAMP one and my global PHP one) to check that the DPO extension is not commented out - and it wasn't. Cleared cache, I even went to the extend of updating WAMP, my PHP version and everything but for whatever reason it still doesn't want to work. My guess is a version compatibility issue.
***
### Solution

As expected it was indeed a versioning issue. It was resolved when I updated my WAMP server, PHP Version and MySQL version in WAMP.

## Part Two - AWS

### The choices

The next step would be the 'FUN' part which is setting up AWS. Since I never personally used AWS I had to do some research on this first and found out there are 2 main ways to do this.

Option A (Low configuration):
Set up a Elastic Beanstalk server, load my Laravel project in it and then look into setting up the LAMBDA function to do my validating for me and call it with AWS API Gateway!

Option B (Serverless - High configuration):

Push my Laravel Project on AWS LAMBDA then build the function to validate the form and so on.

At the end I went with Option A since I am not very experienced with AWS and I am also running out of time.

**Small side note**
I feel the need to mention that I personally do not see the point of using a lambda function to do the validation for my Laravel project when Laravel comes with a very bespoke validation functionality. Regardless I did try (but failed) to do it though LAMBDA!

**End of day 1**

I was really hoping this would take me a day tops but it's currently 02:40am Wednesday and I need to call it a day cause tomorrow I have to go to the office. As a small recap I have managed to create my Laravel project and make everything work on the local environment. I was able to set up my AWS RDS, Elastic Beanstalk and SSH into my EC2 instance to fix any issues that came up with linking the database with the instance plus some nginx settings I had to sort before I could use all my routes and so on. What's left to do tomorrow is the LAMBDA function and some testing before I wrap it and ship it. Fingers crossed I will be able to do it at a reasonable time after work but most probably I will send this over Thursday morning!

### LAMBDA time

Thursday was one of those days were I ended up coming home at 20:00 from work and I did not feel like doing more coding. Ended up doing some research on LAMBDA functions and called it a day at around 01:00am.

**End of day 2**

Continuing today I tried to make LAMBDA work. I created a JSON Schema model and everything to validate and only invoke my LAMBDA function when we have valid data. I played around with API calls in Postman to get the right response to display the build in Laravel validation errors but at no avail. Regardless I pasted some code under 'rousouces/misc' which guides more or less my though process but lacks the detail and an actual solution. W

##Final thoughts

With the above said I decided to call it quits as I have been working on this for technically 2 days when it should be a few hours. I do not think I over engineered it but perhaps the fact that I used a framework added some time to it but I also wanted to show that I know what I am doing when it comes to Laravel and if need be I am more than happy to get an AWS certification to learn that tech stack as well! Any feedback is greatly appreciated, even negative as it's a way for me to know if I am heading in the right direction or not. I would love to see a working solution to this if possible just to solve my own curiosity!
