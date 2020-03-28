## Requirements
- This application is written in Php and needs Php 5.5 or above - (CLI should be enough)

## Source Code
### Datasources
- Contains the datasources to store application data.  
- For this assignment, only InMemoryDataSource is defined with few methods, but we can define as many different data sources as we want and use them for data storage.  

### Models
- Contains the models (which store data in memory using the memory datasource).  
- All models extend a base AbstractModel which provides most of the methods to interact with DataSource.   
- Datasource selection is done at the AbstractModel.php. And the selection is hard-coded at the end of the file for now.  

### Services
- Contains the service classes which define the business logic for various use cases.  

### Notes:
- Validations - Skipped validations for the data inputs for now.  

## Test
test.php - contains the sample test cases/example to run using the service classes defined. 

You can execute the below command from command line to run the examples:  
- `$ php test.php`

