# Words 2 Prime
> Application that takes an text and says if each word is a prime number

This application takes a text as an argument, separates each word from the text, transform each word to a number based on it's letters (a = 1, b = 2 and so on...) and says if this number is a Prime number or not.

I used Go as tool to do this application because of two things
1. I can put every word of the text in a single Go Routine and process it separately, this way the process will be way faster
2. I could've used Java to do this, but a new thread in Java costs 1 MB while a Go Routines costs only 2 KB (It's super light!)

## How to run
If you already have go installed, follow these steps:
- Clone the repo
- Open your terminal and go to the folder where you just downloaded this repository
- ```go run main.go```

That's it. If you want to change the text, open ```main.go``` and change the variable called ```textoSlice```

You'll notice that the words and the results won't be in order to every word on the text it's created a new Go Routine (A new thread to Java/C# lovers) to process it so the process won't take too long to finish.
