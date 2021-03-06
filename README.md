# Android-StackOverflow Tool

The tool is called ‘Android Updates on Stack Overflow'. It is essentially a simple website that fetches APIs of Stack Overflow to show in real-time the newest and most popular Android related updates, questions and tags. It has been hosted publicly and can be viewed here: https://androidstackoverflow.000webhostapp.com/. More specifically, the website has 3 sections:

# 1. Latest Questions: 
On clicking this tab, the user is presented with a table that shows the top ten newest Android-related questions that have been asked. The table contains 4 separate columns:

* Votes: This shows the total score/votes the question has gotten.

* Title of Question: This shows the title of the question that has been asked. On clicking the title, however, the user is directed to the Stack Overflow website to fully       view the thread.

* Asked By: This shows the name of the owner of this question. In case name is not provided, it is replaced with ‘Somebody’. 

* Question Preview: This shows a snippet of the body of the question asked. This allows the user to decide on whether he finds the thread interesting enough to visit the        website without cluttering the screen with the entire thread. HTML tags from the question body fetched via the API is removed first and then the table shows up to 300            characters (full question body if it has less than 300 characters).  


# 2. Most Voted Questions: 
On clicking this tab, the user is presented with a table that shows the top ten most voted Android-related questions of the past week that have been asked. The table contains 5 separate columns: 

* Votes: Same as before.

* Title of Question: Same as before.

* Asked By: Same as before. 

* Question Preview: Same as before.

* Top Answer Preview: This shows a snippet of the body of the top answer provided against the question asked. The acceptance status of all the answers are first checked, if     there is a tie (none has been accepted), the score of the answers are compared and the top one is shown. HTML tags from the body of the top answer fetched via the API is         removed first and then the table shows up to 300 characters (full answer body if it has less than 300 characters). If, however, no answer is found, it says ‘Not Found’.


# 3. Trending Tags: 
On clicking this tab, the user is presented with a table that shows the top ten most active Android tags. The table contains 2 separate columns:

* Tag Name: It shows the name of the tag which is trending.

* Total Popularity Count: It shows the popularity score of the corresponding tag which helps the user to identify the all-time popular tags as well.


# How to Setup Tool: 
The tool can be set up very easily following the steps below:

* Install Xampp and run Apache in the background.

* Under the folder htdocs of where Xampp has been installed, open a folder named ‘’stack”. The files mostvoted.php, index.php and trending.php should be here. It should 	  also have two folders named: ‘‘css’’ and ‘’link’’.  Under css, there is a file called style.php and under link there is a file called links.php.

* Run the website on your localhost with links like: localhost/stack/trending.php , localhost/stack/mostvoted.php , localhost/stack/index.php etc. The tabs are  	         interconnected so you can switch from one page to another just by clicking the corresponding icons.

* If folder and file names are left unchanged, no need to edit the .php files. Otherwise, update the file paths in the code for index.php, trending.php and     	         mostvoted.php


*Apart from that, the website also has vertical and horizontal scroll bars and is adjustable to mobile screen*


# APIs Used: 

The API documentation of Stack Overflow was studied and necessary filters were custom added to retrieve desired data.

# Languages Used:

* JavaScript
* JQuery
* PHP
* HTML
* CSS
