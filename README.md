Step 1:
run: composer update

Step 2:
run: npm install
run: npm run dev

Step 3:
create a database and update configuration settings in .env file [ If .env is not available copy .env.example file and rename it]

Step 4:
Update setting for QUEUE_CONNECTION=database


Step 5:
run: php artisan key:generate

Step 6:
run: php artisan migrate

Step 7:
run: composer dump-autoload
run: php artisan db:seed

Step 7: to run your application on http://127.0.0.1:8000/, run below command
run: php artisan serve

Step 8: To run queue job, run below command
run: php artisan queue:work
