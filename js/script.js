
        // function for posting caption
        function post() {
            event.preventDefault();
            var captionContainer = document.querySelector("#caption-container"); // caption-container variable
            var surveryContainer = document.querySelector("#survey-container"); // survey-container variable
            var caption = document.querySelector("#caption").value; // caption variable
            var dogname = document.querySelector("#dogname").value; //dog's name variable
            var age = document.querySelector("#age").value; //dog's age variable
            var breed = document.querySelector("#breed").value; //dog breed variable
            var gender = document.getElementsByName('gender'); // gender variable
            var treat = document.querySelector("#treat").value; // favorite dog treat variable
            var trick = document.querySelector("#trick").value; // dog trick variable
            
            if (caption == "" || dogname == "" || age == "" || breed == "" || gender == "" || treat == "" || trick == "") {
                alert("Empty field detected: fill out the entire Doggo Bloggo form!");
                return false;
            }
            
            // capturing value for dog's gender
            for (var i = 0; i < gender.length; i++) {
                if (gender[i].checked) {
                    gender = gender[i].value;
                    break;
                }
            }
            switch (gender) {
                 case "xx":
                    gender = "good girl";
                    break;
                case "xy":
                    gender = "good boy";   
            }
            
            // capturing value for treat
            switch (treat) {
                case "0":
                    treat = "Shockingly, your dog doesn't indulge on treats!";
                    break;
                case "1":
                    treat = "Yum, your dog loves crunchy Milk-Bones!";
                    break;
                case "2":
                    treat = "Yum, your dog loves teeth-cleaning Dentastix!";
                    break;
                case "3":
                    treat = "Yum, your dog loves delicious Sausage Links!";
                    break;
                case "4":
                    treat = "Yum, your dog loves crispy Bacon Bits!";
            }
            
            // capturing value for trick
            switch (trick) {
                case "0":
                    trick = "Your dog doesn't know any tricks yet... Maybe you can teach your pup something new! ";
                    break;
                case "1":
                    trick = "Wow, your dog knows how to sit... That is one smart doggo!";
                    break;
                case "2":
                    trick = "Wow, your dog knows how to stay... That is one smart doggo!";
                    break;
                case "3":
                    trick = "Wow, your dog knows how to roll over... That is one smart doggo!";
                    break;
                case "4":
                    trick = "Wow, your dog knows how to fetch... That is one smart doggo!";
            }
             
            // new html for caption container
            var newHtml = ""; 
            newHtml += "<div id=\"caption-container\">" + caption + "</div><br>";
            
            captionContainer.innerHTML = newHtml;
            
            // new html for survey container
            var newHTML = ""; 
            newHTML += "<div id=\"survey-container\" class=\"row\"><h2>A little bit about your pup...</h2> Your dog, " + dogname + ", is a " + age + " year old " + breed + " pup! </div>";
            newHTML += "<div id=\"survey-container\" class=\"row\"> Wow, what a " + gender + "!</div><br>";
            newHTML += "<div id=\"survey-container\" class=\"row\"><h2>Snack Time...</h2>" + treat + "</div><br>";
            newHTML += "<div id=\"survey-container\" class=\"row\"><h2>Play Time...</h2>" + trick + "</div><br>";
            newHTML += "<div id=\"survey-container\" class=\"row\"><h2>Your Daily Doggo post...</h2></div>";
            
            surveryContainer.innerHTML = newHTML;  
        }
        
        // function for choosing photo 
        var picFile = function(event) {
                var image = document.getElementById("pic-output"); // image variable 
                image.src = URL.createObjectURL(event.target.files[0]);    
        };