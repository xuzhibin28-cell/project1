<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>guest world</title>
</head>
<body>
    <style>
        div{
            display: ;
            border: 5px solid silver;
            text-align: center;
            background-color: gold;
            color: white;
            font-size: bord;
        }
        div2{
            border: 5px solid black;
            text-align: center;
        }
        
    </style>
    <div>
    <h1>javascipt basics-guest word</h1>
    <label for ="guestInput">guest the word</label> 
    <p id="word"></p>
    <input type="text" id="guestInput"/>
    <button type="button" onclick="checkGuestWord()">submit</button>
</div>

    <script>
        const words=["apple","banana","grape","orange","mango"];
        const p =document.getElementById('word');
        let i=0;

        let HintWord=words[i].replace(words[i].substring(1,4),"***");
        p.innerHTML=HintWord;



        function changeword(){
            i++;
            if (i>=words.length){
                i=0;
            }
            HintWord=words[i].replace(words[i].substring(1,4),"***");
            p.innerHTML=HintWord;
        }

        function checkGuestWord(){
            const guestWord=document.getElementById('guestInput').value;
            const h2=document.createElement("h2");
            let status=false;
            /*words.forEach(function(word){
                if (guestWord.toLowerCase()===word){
                    status=true;
                }
            });*/
            const word=words[i];
            if(word.toLowerCase()===guestWord.toLowerCase()){
                status=true;
            }

            if(status){
                h2.innerText="ok";
                changeword();
            }else{
                h2.innerText="no!";
            }
             document.body.appendChild(h2);
        }
    </script>
    <div2>
        <label> none</label>
        
    </div2>

</body>
</html>