# desjadinsExpenseExtractor
Because desjardin does not provide a easy way to export all the transaction of a certain month.

# Run

put the table html into the file "table.html". This table is found inside accesD in budget then in transation. 
You can filter by month and other filter. Juste make you selection and the copy the DOM of the entire table.

TODO :: Support multipage... i dont know how yet.

```bash
php expenseExtractor.php
```

Will generate a csv file format. You can pass those data into AI to summurise you expense.

**Prompt** : 

Give me a detailed breakdown of my finances for <month>, including all income sources, expenses categorized (like rent, groceries, subscriptions, etc.), and a final summary with total income, expenses, and net balance.

<your csv data here>
