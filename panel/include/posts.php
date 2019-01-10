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
                    <li><a href="#" onclick="addBold()"><strong>b</strong></a></li>
                    <li><a href="#" onclick="addItalic()"><i>i</i></a></li>
                    <li><a href="#" onclick="addSub()"><u>s</u></a></li>
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
            </script>
         </form>
        </div>
</div>
        <?php } ?>