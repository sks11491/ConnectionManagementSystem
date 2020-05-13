Step 1:<br/>
run: composer update

Step 2:<br/>
run: npm install
run: npm run dev

Step 3:<br/>
create a database and update configuration settings in .env file [ If .env is not available copy .env.example file and rename it]

Step 4:<br/>
Update setting for QUEUE_CONNECTION=database in .env file


Step 5:<br/>
run: php artisan key:generate

Step 6:<br/>
run: php artisan migrate

Step 7:<br/>
run: composer dump-autoload
run: php artisan db:seed

Step 7: to run your application on http://127.0.0.1:8000/, run below command <br/>
run: php artisan serve

Step 8: To run queue job, run below command <br/>
run: php artisan queue:work
