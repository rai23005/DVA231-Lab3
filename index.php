<?php
session_start();

// Ange standardfilen
$filePath = 'Ass2News.json'; 

// Kontrollera om en ny fil har laddats upp och sparats i sessionen
if (isset($_SESSION['uploaded_json'])) {
    $filePath = 'news.json'; // Använd den uppladdade filen istället
}

// Läs JSON-filen
$newsData = file_exists($filePath) ? json_decode(file_get_contents($filePath), true) : [];

// Definiera boxarna som ska uppdateras
$boxIds = [2, 3, 4, 5, 7];
?>







<!DOCTYPE html> <!--Definierar dokumenttypen och versionen av HTML som används. Här är det HTML5.-->

<html lang="en"> <!-- HTML:element is the root element of an HTML page, lan=language -->

<head>  <!-- element contains meta information about the HTML page-->


    <meta charset="UTF-8"> <!-- standardaen, element contains meta information about the HTML page-->

    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--Så att det är innanför ramen-->

    <title>DVA231-LAB1</title> <!-- element specifies a title for the HTML page
     (which is shown in the browser's title bar or in the page's tab)-->

    <link rel="stylesheet" href="styles.css"> <!--referar till css filen -->

    
</head>


 <!--element defines the document's body. Vad som syns på hemsidan -->
<body>


    <a href="https://your-link.com" target="_blank">

        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRubCriSmlaQ47ORyxiDd6pCQW3hcTN3SXA1sP825CLozr4M8wq" 

        alt="Icon" class="top-right-image"> <!--a href är vad som sker när man klickar på den. Lilla bilden uppe i hörnet brevid search--> 
    </a>

    <div class="container"> <!-- Anropar på klassen som finns i css filen-->
    
    
        <div class="header"> <!-- Header Section. En container-div som omger hela innehållet på sidan.-->

            <div class="logo">RT</div> 

            <div class="nav"> <!--Navigationssektionen med länkar och en sökruta.-->

                <a href="http://localhost/Labb2/login.php">Admin Page</a> <!-- Länk till admin-sidan -->


                <!-- Länkarna -->
              <div class="links-grid"> <!-- First row of links -->

              <div class="top-links">
                <a href="https://www.google.com">Link 1</a> |
                <a href="#">Link 2</a> |
                <a href="#">Link 3</a> |
                <a href="#">Link 4</a> |
                <a href="#">Link 5</a> |
                <a href="#">Link 6</a> |
                <a href="#">Link 7</a>
                <input type="text" placeholder="Search">
            </div>
      


            <div class="bottom-links"> <!-- Second row of links -->
                <a href="#">Link 1</a> |
                <a href="#">Link 2</a> |
                <a href="#">Link 3</a> |
                <a href="#">Link 4</a> |
                <a href="#">Link 5</a>
                <a href="#">Link 6</a> |
                <a href="#">Link 7</a> |
                <a href="#">Link 8</a> |
                <a href="#">Link 9</a> 

            </div>
        </div>
        </div>
    </div>
        


   

         <div class="main-content">  <!--Main Content Section. Detta är en container som kapslar in alla 
            dess barn (dvs. de olika box-elementen). Denna container används för att strukturera och 
            styla huvudinnehållet på sidan.-->
             
          
      

    <!-- För box 2. -->
<div class="box secound-box" id="news-box-2"> 
    <span>
        <p id="headline"> <!-- Första ordet, "Breaking" -->
            <span id="pWhiteBlue">Breaking</span>
        </p>
    </span>
    <span>
        <p id="headlinen"> <!-- Andra ordet, "News" -->
            <span id="pBlackWhite">News</span>
        </p>
    </span>
</div>


<!-- Script för att uppdatera varje 5 sekund -->
<script>
    const headlines = [ // Array för första ordet
        "<span id='pWhiteBlue'>Breaking</span>",
        "<span id='pWhiteBlue'>Latest</span>",
        "<span id='pWhiteBlue'>Top</span>"
    ];

    const headlinen = [ // Array för andra ordet
        "<span id='pBlackWhite'>News</span>",
        "<span id='pBlackWhite'>Update</span>",
        "<span id='pBlackWhite'>Story</span>"
    ];

    let currentHeadline = 0; // Variabel för första ordets index
    let currentHeadlinen = 0; // Variabel för andra ordets index

    function updateHeadline() {
        // Uppdatera första ordet (headline)
        const headlineElement = document.getElementById("headline");
        headlineElement.innerHTML = headlines[currentHeadline];
        
        // Uppdatera andra ordet (headlinen)
        const headlinenElement = document.getElementById("headlinen");
        headlinenElement.innerHTML = headlinen[currentHeadlinen];
        
        // Increment the index for both words
        currentHeadline = (currentHeadline + 1) % headlines.length;
        currentHeadlinen = (currentHeadlinen + 1) % headlinen.length;
    }

    // Byt ut texten var femte sekund (5000 millisekunder)
    setInterval(updateHeadline, 5000);

   
</script>

<script>
    // PHP skickar filnamnet som ska användas till JavaScript
    const jsonFile = "<?php echo $filePath; ?>";
</script>
        
            <!-- För box 3. -->
<div class="box third-box" id="news-box-3"> 
<script>
                    // Hämta data från den valda JSON-filen (ny eller standard)
                    fetch(jsonFile)
                        .then(response => response.json())
                        .then(json => {
                            // Exempel för box 3
                            const box3 = json["box_3"][0];
                            const box3_titleElement = document.querySelector('.third-box h3');
                            const box3_contentElement = document.querySelector('.third-box-list');
                            
                            // Uppdatera innehållet för box 3
                            box3_titleElement.textContent = box3.title; 
                            box3_contentElement.textContent = box3.content; 
                        })
                        .catch(error => console.error('Error could not connect to server:', error));
                </script>


                <h3>Grocery list<br> </h3>
                <br>
                <hr>
                <br>
                <ul class="third-box-list">
                    <li>Milk</li>
                    <li>Wheat</li>
                    <li>Egg</li>
                    <li>Salt</li>
                    <li>Jam</li>
                    <li>Whip cream</li>

                </ul>
                <br>
                <hr>
                <br>
                <div class="third-box-links" align-items: center;>
                    <a href="https://www.google.com">Link 1</a>
                    <a href="#">Link 2</a>
                </div>
            </div>
    


      <!--För box 4-->
      <div class="box four-box" style="background-image: url('');">
                <script>
                    // Hämta data från JSON-fil
                    fetch('Ass2News.json')
                        .then(response => response.json())  // Omvandla till JSON
                        .then(json => {
                            // Hämta första objektet från "box_4" i JSON-filen
                            const box4 = json["box_4"][0];
            
                            // Hitta HTML-elementen som skall refferas till
                            const box4_titleElement = document.querySelector('.four-box p'); 
                            const box4_contentElement = document.querySelector('.four-box_box_to_cover p'); 
                            const box4_contentCoverElement = document.querySelector('.four-box_cover-box p'); // Hitta paragrafen inuti four-box_cover-box
                            const box4_backgroundImage = document.querySelector('.four-box'); // Hitta boxen
            
                            // Uppdatera h3-texten, p-elementet och bakgrundsbilden med värden från box_4
                            box4_titleElement.textContent = box4.title; // Uppdatera text från JSON för titel
                            box4_contentElement.textContent = box4.content; // Uppdatera text från JSON för content
                            box4_contentCoverElement.textContent = box4.content_cover; // Uppdatera text från JSON för content_cover
            
                            // Ställ in bakgrundsbilden
                            box4_backgroundImage.style.backgroundImage = `url('${box4.imgurl}')`;
                        })
                        .catch(error => console.error('Error could not connect to server:', error));
                </script>

                              
                <span><p id="pWhiteBlue">Step to make pankake </p><span></span>
                     <div class="four-box_box_to_cover">
                    <p id="pBlackWhite">Pour half the milk and all the wheat</p>
                    <div class="four-box_cover-box">
                        <p>Mix until smooth batter</p>
                    </div>
                </div>
                         
            </div>





            <!-- För box 5 -->
            <div class="box five-box" style="background-image: url('');">
                <script>
                    /* Hämta data från JSON-fil */
                    fetch(jsonFile)
                        .then(response => response.json())  // Omvandla till JSON
                        .then(json => {
                            /* Hämta första objektet från "box 5" i Json-filen */
                            const box5 = json["box_5"][0];

                            /* Hitta HTML-elementen som skall refferas till */
                            const box5_titleElement = document.querySelector('.five-box h3');
                            const box5_contentElement = document.querySelector('.five-box p');
                            const box5backgroundImage = document.querySelector('.five-box');

                            /* Uppdatera h3-texten, p-elementet och bakgrundsbilden med värden från box5 */
                            box5_titleElement.textContent = box5.title;
                            box5_contentElement.textContent = box5.content;

                            /* Ställ in bakgrundsbilden så att den täcker halva rutan */
                            box5backgroundImage.style.backgroundImage = `linear-gradient(to right, transparent 50%, white 50%), url('${box5.imgurl}')`;

                        })
                        .catch(error => console.error('Error could not connect to server:', error));
                </script>

                <!-- HTML för innehållet som uppdateras från JSON-filen -->
                <h3 style="color: #008cff;">Loding...</h3>
                <span>
                    <br>
                    <p id="pBlackWhite">Loding...</p>
                </span>
                <div class="five-box-links">
                    <a style="color: #008cff;" href="https://www.google.com">Link 1</a>
                    <a style="color: #008cff;" href="#">Link 2</a>
                </div>
            </div>




          <!--För box 6, video-->
            <div class="box sixth-box"id="news-box-6">
                    <video class="video_box" controls>
                        <source src="Media/mp4/video_fil.mp4" type="video/mp4">
                        Din webbläsare kan inte spela upp videon.
                    </video>
            </div>
          



            <!--För box 7-->
          <div class="box seven-box"id="news-box-7">7
          <script>
                    /* Hämta data från JSON-fil */
                    fetch('Ass2News.json')
                        .then(response => response.json())  // Omvandla till JSON
                        .then(json => {
                            /* Hämta första objektet från "box 7" i Json-filen */
                            const box7 = json["box_7"][0];

                            /* Hitta HTML-elementen */

                            const box7_backgroundImage = document.querySelector('.seven-box');


                            /* Ställ in bakgrundsbilden*/
                            box7_backgroundImage.style.backgroundImage = `url('${box7.imgurl}')`;
                        })
                        .catch(error => console.error('Error could not connect to server:', error));
                </script>
            </div> 
          


                <!--För box 8, twitter-->
                <div class="box eight-box"> <a class="twitter-timeline"
                    href="https://twitter.com/elonmusk?ref_src=twsrc%5Etfw">Tweets by elonmusk</a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>

       
     



</body>
</html>
