 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="gallery-grid.css">

<style>

 

.lightbox img {
    width: 100%;
    margin-bottom: 30px;
    transition: 0.2s ease-in-out;
    box-shadow: 0 2px 3px rgba(0,0,0,0.2);
}


.lightbox img:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 15px rgba(0,0,0,0.3);
}

.img {
    border-radius: 4px;
}

.baguetteBox-button {
    background-color: transparent !important;
}


 
</style>

 
 
     
    <div class="tz-gallery">
          
 
                        @foreach($property->gallery as $gallery)

            <div class="col-sm-6 col-md-4">
                <a class="lightbox" href="{{Storage::url('property/gallery/'.$gallery->name)}}">
                    <img src="{{Storage::url('property/gallery/'.$gallery->name)}}" alt="Park">
                </a>
            </div>
            
                        @endforeach
 
            
   

    

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>

 
        
    