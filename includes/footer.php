        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="./js/main.js"></script>
        <script>
            //ToggleMenu
            function toggleMenu(){
            let navigation = document.querySelector('.leftSide');
            let toggle = document.querySelector('.toggle');
            
            navigation.classList.toggle('active');
            toggle.classList.toggle('active');
            }
        </script>
    </body>
</html>