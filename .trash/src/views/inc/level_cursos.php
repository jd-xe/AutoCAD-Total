
<style>
    #level-container{
        padding-bottom: 25px;
        padding-top: 40px;
    }
    #level-title{
        color: aliceblue;
        padding-bottom: 10px;
    }
  
#nivelBasicoHeading {
  background-color: #000000; 
  border-radius: 8px; 
  overflow: hidden;
  margin-bottom: 10px;
}

#nivelBasicoHeading .accordion-button {
  color: #fff; 
  background-color: transparent; 
  border: none; 
  font-size: 1.25rem;
  font-weight: bold;
  padding: 12px 20px; 
  transition: all 0.3s ease;
}

#nivelBasicoHeading .accordion-button:hover {
  background-color:rgb(46, 46, 46); 
  color: #e9ecef; 
}


#nivelBasico {
  background-color:rgb(228, 227, 227); 
  border-left: 2px solid rgb(31, 32, 32); 
  padding: 15px; 
  border-radius: 0 8px 8px 8px; 
}


#nivelBasico .accordion-body ul {
  margin: 0;
  padding: 0;
  list-style: none; 
}

#nivelBasico  .accordion-body ul li {
  padding: 8px 0; 
  font-size: 1rem; 
  color: #333; 
  position: relative;
  padding-left: 25px; 
}

#nivelBasico  .accordion-body ul li::before {
  content: "✔"; 
  color:rgb(10, 10, 10);
  border-radius: 8px;
  position: absolute;
  left: 0; 
  font-size: 1rem;
}
#nivelIntermedioHeading {
  background-color: #000000; 
  border-radius: 8px; 
  overflow: hidden;
  margin-bottom: 10px;
}

#nivelIntermedioHeading .accordion-button {
  color: #fff; 
  background-color: transparent; 
  border: none; 
  font-size: 1.25rem; 
  font-weight: bold; 
  padding: 12px 20px; 
  transition: all 0.3s ease; 
}

#nivelIntermedioHeading .accordion-button:hover {
  background-color:rgb(46, 46, 46); 
  color: #e9ecef; 
}


#nivelIntermedio {
  background-color: #f8f9fa; 
  border-left: 2px solid rgb(31, 32, 32); 
  padding: 15px; 
  border-radius: 0 8px 8px 8px; 
}


#nivelIntermedio .accordion-body ul {
  margin: 0;
  padding: 0;
  list-style: none; 
}

#nivelIntermedio  .accordion-body ul li {
  padding: 8px 0; 
  font-size: 1rem; 
  color: #333; 
  position: relative;
  padding-left: 25px; 
}

#nivelIntermedio  .accordion-body ul li::before {
  content: "✔"; 
  color:rgb(10, 10, 10); 
  border-radius: 8px;
  position: absolute;
  left: 0; 
  font-size: 1rem;
}
 
#nivelAvanzadoHeading {
  background-color: #000000; 
  border-radius: 8px; 
  overflow: hidden;
  margin-bottom: 10px;
}

#nivelAvanzadoHeading .accordion-button {
  color: #fff; 
  background-color: transparent; 
  border: none; 
  font-size: 1.25rem; 
  font-weight: bold; 
  padding: 12px 20px; 
  transition: all 0.3s ease; 
}

#nivelAvanzadoHeading .accordion-button:hover {
  background-color:rgb(46, 46, 46); 
  color: #e9ecef; 
}


#nivelAvanzado {
  background-color: #f8f9fa;
  border-left: 2px solid rgb(31, 32, 32);
  padding: 15px; 
  border-radius: 0 8px 8px 8px; 
}


#nivelAvanzado .accordion-body ul {
  margin: 0;
  padding: 0;
  list-style: none; 
}

#nivelAvanzado  .accordion-body ul li {
  padding: 8px 0; 
  font-size: 1rem; 
  color: #333; 
  position: relative;
  padding-left: 25px; 
}

#nivelAvanzado  .accordion-body ul li::before {
  content: "✔"; 
  color:rgb(10, 10, 10); 
  border-radius: 8px;
  position: absolute;
  left: 0; 
  font-size: 1rem;
} 
</style>

<div class="container col-md-6" id="level-container">
    <h2 class="text-center" id="level-title">Temas por niveles</h2>
    <div class="accordion" id="accordionCursos">

        <!-- Nivel Básico -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="nivelBasicoHeading">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nivelBasico" aria-expanded="true" aria-controls="nivelBasico">
                    Nivel Básico
                </button>
            </h2>
            <div id="nivelBasico" class="accordion-collapse collapse show" aria-labelledby="nivelBasicoHeading" data-bs-parent="#accordionCursos">
                <div class="accordion-body">
                    <ul>
                        <li>Introducción a AutoCAD</li>
                        <li>Interfaz y Herramientas Básicas</li>
                        <li>Dibujo de Líneas y Figuras</li>
                        <li>Uso de Capas y Propiedades</li>
                        <li>Creación de Bloques</li>
                        <li>Impresión y Exportación</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Nivel Intermedio -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="nivelIntermedioHeading">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nivelIntermedio" aria-expanded="false" aria-controls="nivelIntermedio">
                    Nivel Intermedio
                </button>
            </h2>
            <div id="nivelIntermedio" class="accordion-collapse collapse" aria-labelledby="nivelIntermedioHeading" data-bs-parent="#accordionCursos">
                <div class="accordion-body">
                    <ul>
                        <li>Herramientas de Edición Avanzadas</li>
                        <li>Trabajo con Referencias Externas</li>
                        <li>Uso de Estilos de Texto y Cotas</li>
                        <li>Creación de Plantillas</li>
                        <li>Introducción a Modelado 3D</li>
                        <li>Renderizado Básico</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Nivel Avanzado -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="nivelAvanzadoHeading">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nivelAvanzado" aria-expanded="false" aria-controls="nivelAvanzado">
                    Nivel Avanzado
                </button>
            </h2>
            <div id="nivelAvanzado" class="accordion-collapse collapse" aria-labelledby="nivelAvanzadoHeading" data-bs-parent="#accordionCursos">
                <div class="accordion-body">
                    <ul>
                        <li>Modelado 3D Complejo</li>
                        <li>Renderizado Avanzado</li>
                        <li>Automatización con Scripts</li>
                        <li>Personalización de la Interfaz</li>
                        <li>Trabajo con Nubes de Puntos</li>
                        <li>Integración con Otras Plataformas CAD</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>