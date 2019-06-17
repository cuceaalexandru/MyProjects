/*Making a simple REPL(read-execute-print loop)*/

#include <stdio.h>
#include <stdlib.h>

struct InputBuffer_t { /*Small wrapper used for storing input from getline()*/
	char* buffer;
	size_t buffer_length;
	ssize_t input_length;
};
typedef struct InputBuffer_t InputBuffer;

InputBuffer* new_input_buffer() {
	InputBuffer* input_buffer = malloc(sizeof(InputBuffer));
	input_buffer->buffer = NULL;
	input_buffer->buffer_length = 0;
	input_buffer->input_length = 0;

	return input_buffer;
}

void print_prompt(){ /*Print prompt to user*/
	printf("db > ");
}


/*Read user input with getline(), to store the input line we use input_buffer->buffer
  to store the size of the allocated buffer we use input_buffer->buffer_length
  to store the return value we use input_buffer->input_length
*/
void read_input(InputBuffer* input_buffer){ 
	ssize_t bytes_read = getline(&(input_buffer->buffer), &(input_buffer->buffer_length), stdin);

	if(bytes_read <= 0){
		printf("Error reading input\n");
		exit(EXIT_FAILURE);
	}

	//Ignore trailing newline
	input_buffer->input_length = bytes_read - 1;
	input_buffer->buffer[bytes_read - 1] = 0;
}

void close_input_buffer(InputBuffer* input_buffer){
	free(input_buffer->buffer);
	free(input_buffer);
}

int main(int argc, char* argv[]){
	InputBuffer* input_buffer = new_input_buffer();
	while (1){
		print_prompt();
		read_input(input_buffer);

		if(strcmp(input_buffer->buffer, ".exit") == 0){
			close_input_buffer(input_buffer);
			exit(EXIT_SUCCESS);
		}else{
			printf("Unrecognized command '%s'.\n", input_buffer->buffer);
		}
	}
}