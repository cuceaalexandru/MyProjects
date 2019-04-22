#include <sqlite3.h>
#include <stdio.h>

int main(int argc, char *argv[]){

	sqlite3 *db; /*Initiate database variable*/
	char *err_msg = 0; 


	int rc = sqlite3_open(":memory:", &db);/*Open a in-memory database*/
	
	if (rc != SQLITE_OK){ /*Error opening sqlite database*/

		fprintf(stderr, "Cannot open database: %s\n", sqlite3_errmsg(db));
		sqlite3_close(db);
	
		return 1;
	}

	char *sql = "CREATE TABLE Friends(Id INTEGER PRIMARY KEY, Name TEXT);"
	"INSERT INTO Friends(Name) VALUES ('Tom');"
	"INSERT INTO Friends(Name) VALUES ('Rebecca');"
	"INSERT INTO Friends(Name) VALUES ('Jim');"
	"INSERT INTO Friends(Name) VALUES ('Roger');"
	"INSERT INTO Friends(Name) VALUES ('Robert');";

	rc = sqlite3_exec(db, sql, 0, 0, &err_msg);/*Execute sql query*/

	if(rc != SQLITE_OK){ /*Error executing sql querry*/
	
		fprintf(stderr, "Failed to create table\n");
		fprintf(stderr, "SQL error: %s\n", err_msg);
		sqlite3_free(err_msg);

	}else{
		fprintf(stdout, "Table Friends created successfully\n");
	}

	int last_id = sqlite3_last_insert_rowid(db);
	printf("The last Id of the inserted row is %d\n", last_id);

	sqlite3_close(db);

	return 0;
}
