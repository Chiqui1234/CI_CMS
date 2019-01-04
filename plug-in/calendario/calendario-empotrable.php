<!-- Este calendario puede empotrarse dentro de un DIV, en vez de salir por el
	 costado como se hace originalmente -->
<?php include_once("inicio.php");
if($estadoCalendario) { ?>
<div id="calendario-empotrable">
<!--	<div class="mes" style="background-image:url('img/invierno-mini.jpg');color: #252525;">
Este código sirve sólo si se quiere abrir la imágen desde este archivo, ¡pero no desde index! Si lo querés incluir
en index.php u otro archivo en el directorio raíz de la web, debés usar el código que está abajo, sin comentar. -->
<div class="mes" style="background-image:url('plug-in/calendario/img/invierno-mini.jpg');color: #252525;">
  <ul>
    <li>Agosto</li>
    <li>2018</li>
  </ul>
</div>

<ul class="dias">
  <li>Dom</li>
  <li>Lun</li>
  <li>Mar</li>
  <li>Mier</li>
  <li>Jue</li>
  <li>Vie</li>
  <li>Sáb</li>
</ul>

<ul class="numeros">
  <li><div class="minimo">29</div></li>
  <li><div class="minimo">30</div></li>
  <li><div class="minimo">31</div></li>
  <li>1</li>
  <li>2</li>
  <li>3</li>
  <li>4</li>
  <li>5</li>
  <li>6</li>
  <li>7</li>
  <li>8</li>
  <li>9</li>
  <li>10</li>
  <li>11</li>
  <li>12</li>
  <li>13</li>
  <li>14</li>
  <li>15</li>
  <li>16</li>
  <li>17</li>
  <li>18</li>
  <li>19</li>
  <li>20</li>
  <li>21</li>
  <li>22</li>
  <li>23</li>
  <li>24</li>
  <li>25</li>
  <li>26</li>
  <li>27</li>
  <li>28</li>
  <li>29</li>
  <li>30</li>
  <li>31</li>
</ul></div>
<?php } ?>