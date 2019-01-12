<?php if($rank == 0) { ?>
<div class="box posts">
        <div class="column">
        <h3>Crear entrada</h3><br />
        <!-- La carpeta "mod" incluye únicamente los archivos que llaman a las funciones.
	    Las funciones de uso exclusivo administrativo (como crear un usuario) permanecen
	    dentro de la carpeta /panel/functions -->
         <form action="mod/addPost.php" method="post">
            <div id="data">
             <div class="column">
                 <input type="text" name="title" placeholder="Título del post" />
                 <input type="text" name="tag" placeholder="Tags" />
                 <input type="text" name="color1" placeholder="Color personalizado 1" />
                 <input type="text" name="color2" placeholder="Color personalizado 2 (hover)" />
                 <input type="text" name="portrait" placeholder="Link de la portada" />
                 <select name="category"><!-- Los valores de este <select> se crean al instalar el plug-in, en base a las categorías que se creen en el instalador -->
                    <option>notas</option>
                    <option>reviews</option>
                 </select>
             </div>

             <div class="column">
                <input type="submit" value="Subir post" />
             </div>
            </div>
        </div>

        <div class="column">
            <div id="miniBar">
                <ul>
                    <li><a onclick="addBold()"><strong>b</strong></a></li>
                    <li><a onclick="addItalic()"><i>i</i></a></li>
                    <li><a onclick="addSub()"><u>s</u></a></li>
                    <li><a onclick="addList()">list</a></li>
                    <li><a onclick="addImg()">img</a></li>
                    <li><a onclick="addCimg()">cimg</a></li>
                </ul>
            </div>
            <textarea name="post" id="text"></textarea>
            <script>
            function addBold() {
                document.getElementById("text").value += "[b][/b]";
            }
            function addItalic() {
                document.getElementById("text").value += "[i][/i]";
            }
            function addSub() {
                document.getElementById("text").value += "[u][/u]";
            }
            function addList() {
                document.getElementById("text").value += "[li][/li]";
            }
            function addImg() {
                document.getElementById("text").value += "[rect][/rect]";
            }
            function addCimg() {
                document.getElementById("text").value += "[circle][/circle]";
            }
            </script>
         </form>
        </div>
</div>
        <?php } ?>