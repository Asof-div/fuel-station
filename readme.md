## TASK: 
Develop a simple CRUD WEB API to manage a Fuel Station inventory. 

## KEY REQUIREMENTS:
The User should be able to; 
1. Create, Update, View and Delete Dispensers. 
2. Create, Update, View and Delete Tanks. 
3. Upload (daily) the volume (in Liters) of product left in each tank at the station 
4. Upload (daily) the volume (in Liters) of product sold by each Dispenser at the station. 

NOTE: 	(1) Assume 1 tank is physically mapped to 1 dispenser.
      	(2) Capture deliveries into a tank when necessary.
        (3) Validate that the current volume left is < (less than) the previous volume left   
                 except there   is a delivery into the tank.

## TOOLS TO USE: 
1) Database: MySQL
2) API Framework: Laravel or SpringBoot. 
3) Codebase should be pushed to a GitHub or BitBucket repository for code review. 

## THINGS WE LOOK OUT FOR:
1) Simple Business logic 
2) Clear separation of concerns between application logic and data logic
3) Tests.


## How to run the start the application
run ./run-migration.sh 
this will run migration and preload the database with data.