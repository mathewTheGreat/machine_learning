PERCEPTRON.
Algorithim.

Initialize the weights and the threshold. Weights may be initialized to 0 or to a small random value. In the example below, we use 0.
For each example j in our training set D, perform the following steps over the input  and desired output:

Calculate the actual output:
 
	



Update the weights:
		




The above step may be repeated until the iteration error
	



is less than a user-specified error threshold        	or a predetermined number

The algorithm updates the weights after steps 2a and 2b. These weights are immediately applied to a pair in the training set, and subsequently updated, rather than waiting until all pairs in the training set have undergone these steps.

