ITERATIVE DICHOTOMIZER 3
Developed an ID3 algorithm to determine which attributes to are best to start (or be the next node ) with when classifying using a decision tree

Algorithm
Given a set of data 
1.	Determine the target attribute of the classification
2.	Calculate the system entropy based on the target attribute from step 1
 
3.	For all other attributes, calculate the Information Gain
a.	Calculate the Entropy of each possible value of the attribute
b.	Calculate Information gain 
i.	IG (S,A) = ES - ⅀ (p(An,S) * E(An,S)) 
4.	Select the attribute with the highest information gain to be the next node in the tree.
5.	Remove data with no variability from the dataset
6.	Remove the attribute from step 5 from the dataset
7.	Repeat step 3 to step 6 until all data attributes have been used up in the tree


