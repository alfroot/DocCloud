<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        $documento = new Category;
        $documento->name = 'Root';
        $documento->description = 'Root';
        $documento->user_id= 1 ;
        $documento->accepted="1";
        $documento->save();

        $documento = new Category;
        $documento->name = 'Deportes';
        $documento->description = 'Categoria Deportiva';
        $documento->category_parent_id = 1;
        $documento->user_id =1 ;
        $documento->accepted="1";
        $documento->save();



        $documento = new Category;
        $documento->name = 'Ciencias';
        $documento->description = 'Categoria de Ciencias';
        $documento->category_parent_id = 1;
        $documento->user_id=1;
        $documento->accepted="1";
        $documento->save();


        //Childs Deportes
        factory(Category::class,1)->create([ 'category_parent_id' => 2, 'name' => 'Acampada y senderismo']);
        factory(Category::class,1)->create([ 'category_parent_id' => 2, 'name' => 'Baloncesto']);
        factory(Category::class,1)->create([ 'category_parent_id' => 2, 'name' => 'Ciclismo']);
        factory(Category::class,1)->create([ 'category_parent_id' => 2, 'name' => 'Coleccionismo deportivo']);
        factory(Category::class,1)->create([ 'category_parent_id' => 2, 'name' => 'Deportes acuáticos']);
        factory(Category::class,1)->create([ 'category_parent_id' => 2, 'name' => 'Equitación']);
        factory(Category::class,1)->create([ 'category_parent_id' => 2, 'name' => 'Escalada y trekking']);
        factory(Category::class,1)->create([ 'category_parent_id' => 2, 'name' => 'Fórmula 1 y motociclismo']);
        factory(Category::class,1)->create([ 'category_parent_id' => 2, 'name' => 'Fútbol']);
        factory(Category::class,1)->create([ 'category_parent_id' => 2, 'name' => 'Gimnasia deportiva y rítmica']);
        factory(Category::class,1)->create([ 'category_parent_id' => 2, 'name' => 'Golf']);
        factory(Category::class,1)->create([ 'category_parent_id' => 2, 'name' => 'Montaña y esquí']);
        factory(Category::class,1)->create([ 'category_parent_id' => 2, 'name' => 'Otros deportes']);

        //Childs Ciencias
        factory(Category::class,1)->create([ 'category_parent_id' => 3, 'name' => 'Ciencias aplicadas‎']);
        factory(Category::class,1)->create([ 'category_parent_id' => 3, 'name' => 'Ciencias formales‎']);
        factory(Category::class,1)->create([ 'category_parent_id' => 3, 'name' => 'Ciencias naturales‎']);
        factory(Category::class,1)->create([ 'category_parent_id' => 3, 'name' => 'Ciencias sociales‎']);


        //Childs Ciencias aplicadas‎
        factory(Category::class,1)->create([ 'category_parent_id' => 17, 'name' => 'Ciencias de la salud']);
        factory(Category::class,1)->create([ 'category_parent_id' => 17, 'name' => 'Ingenierías']);
        factory(Category::class,1)->create([ 'category_parent_id' => 17, 'name' => 'Pedagogía']);
        factory(Category::class,1)->create([ 'category_parent_id' => 17, 'name' => 'Sociología']);
        factory(Category::class,1)->create([ 'category_parent_id' => 17, 'name' => 'Tecnología']);
        factory(Category::class,1)->create([ 'category_parent_id' => 17, 'name' => 'Telecomunicaciones']);

        //Childs ciencias salud
        factory(Category::class,1)->create([ 'category_parent_id' => 21, 'name' => 'Alimentación']);
        factory(Category::class,1)->create([ 'category_parent_id' => 21, 'name' => 'Medicina']);
        factory(Category::class,1)->create([ 'category_parent_id' => 21, 'name' => 'Psicología']);
        factory(Category::class,1)->create([ 'category_parent_id' => 21, 'name' => 'Enfermería']);
        factory(Category::class,1)->create([ 'category_parent_id' => 21, 'name' => 'Medicina Veterinaria']);

        //Childs ingenierias
        factory(Category::class,1)->create([ 'category_parent_id' => 22, 'name' => 'Electricidad y Electrónica']);
        factory(Category::class,1)->create([ 'category_parent_id' => 22, 'name' => 'Informática']);
        factory(Category::class,1)->create([ 'category_parent_id' => 22, 'name' => 'Ingeniería aeronáutica']);
        factory(Category::class,1)->create([ 'category_parent_id' => 22, 'name' => 'Ingeniería Civil']);
        factory(Category::class,1)->create([ 'category_parent_id' => 22, 'name' => 'Ingeniería del conocimiento']);
        factory(Category::class,1)->create([ 'category_parent_id' => 22, 'name' => 'Ingeniería Mecatrónica']);
        factory(Category::class,1)->create([ 'category_parent_id' => 22, 'name' => 'Ingeniería mecánica']);
        factory(Category::class,1)->create([ 'category_parent_id' => 22, 'name' => 'Ingeniería química']);
        factory(Category::class,1)->create([ 'category_parent_id' => 22, 'name' => 'Ingeniería de fabricación']);
        factory(Category::class,1)->create([ 'category_parent_id' => 22, 'name' => 'Las Interfaces de Usuario']);


        //Childs Ciencias formales
        factory(Category::class,1)->create([ 'category_parent_id' => 18, 'name' => 'Estadística']);
        factory(Category::class,1)->create([ 'category_parent_id' => 18, 'name' => 'Libros de Matemática']);

        //Childs Ciencias naturaes
        factory(Category::class,1)->create([ 'category_parent_id' => 19, 'name' => 'Astronomía']);
        factory(Category::class,1)->create([ 'category_parent_id' => 19, 'name' => 'Biología']);
        factory(Category::class,1)->create([ 'category_parent_id' => 19, 'name' => 'Ciencias de la Tierra']);
        factory(Category::class,1)->create([ 'category_parent_id' => 19, 'name' => 'Ecología']);
        factory(Category::class,1)->create([ 'category_parent_id' => 19, 'name' => 'Física']);
        factory(Category::class,1)->create([ 'category_parent_id' => 19, 'name' => 'Geografía']);
        factory(Category::class,1)->create([ 'category_parent_id' => 19, 'name' => 'Química']);

        //Childs Ciencias sociales
        factory(Category::class,1)->create([ 'category_parent_id' => 20, 'name' => 'Administración']);
        factory(Category::class,1)->create([ 'category_parent_id' => 20, 'name' => 'Comunicación']);
        factory(Category::class,1)->create([ 'category_parent_id' => 20, 'name' => 'Contabilidad']);
        factory(Category::class,1)->create([ 'category_parent_id' => 20, 'name' => 'Derecho']);
        factory(Category::class,1)->create([ 'category_parent_id' => 20, 'name' => 'Desarrollo Social']);
        factory(Category::class,1)->create([ 'category_parent_id' => 20, 'name' => 'Economía']);
        factory(Category::class,1)->create([ 'category_parent_id' => 20, 'name' => 'Educación']);
        factory(Category::class,1)->create([ 'category_parent_id' => 20, 'name' => 'Filosofía']);
        factory(Category::class,1)->create([ 'category_parent_id' => 20, 'name' => 'Geografía']);
        factory(Category::class,1)->create([ 'category_parent_id' => 20, 'name' => 'Historia']);
        factory(Category::class,1)->create([ 'category_parent_id' => 20, 'name' => 'Lingüística']);
        factory(Category::class,1)->create([ 'category_parent_id' => 20, 'name' => 'Religión']);
        factory(Category::class,1)->create([ 'category_parent_id' => 20, 'name' => 'Educación democrática']);
        factory(Category::class,1)->create([ 'category_parent_id' => 20, 'name' => 'Quehacer científico']);

        //Childs Administracion
        factory(Category::class,1)->create([ 'category_parent_id' => 51, 'name' => 'Administración de costos']);
        factory(Category::class,1)->create([ 'category_parent_id' => 51, 'name' => 'Administración de empresas']);
        factory(Category::class,1)->create([ 'category_parent_id' => 51, 'name' => 'Administración de tiempo']);
        factory(Category::class,1)->create([ 'category_parent_id' => 51, 'name' => 'Complementos de los cursos']);
        factory(Category::class,1)->create([ 'category_parent_id' => 51, 'name' => 'Diseño organizacional']);
        factory(Category::class,1)->create([ 'category_parent_id' => 51, 'name' => 'Estadística para los negocios']);

        //Arte
        factory(Category::class,1)->create([ 'category_parent_id' => 1, 'name' => 'Arte']);

        factory(Category::class,1)->create([ 'category_parent_id' => 71, 'name' => 'Arquitectura']);
        factory(Category::class,1)->create([ 'category_parent_id' => 71, 'name' => 'Arte precolombino']);
        factory(Category::class,1)->create([ 'category_parent_id' => 71, 'name' => 'Catálogo de obras de Erminio Blotta']);
        factory(Category::class,1)->create([ 'category_parent_id' => 71, 'name' => 'Circo']);
        factory(Category::class,1)->create([ 'category_parent_id' => 71, 'name' => 'Dibujo']);
        factory(Category::class,1)->create([ 'category_parent_id' => 71, 'name' => 'Fotografía']);
        factory(Category::class,1)->create([ 'category_parent_id' => 71, 'name' => 'Literatura']);
        factory(Category::class,1)->create([ 'category_parent_id' => 71, 'name' => 'Manga']);
        factory(Category::class,1)->create([ 'category_parent_id' => 71, 'name' => 'Música']);
        factory(Category::class,1)->create([ 'category_parent_id' => 71, 'name' => 'Origami']);
        factory(Category::class,1)->create([ 'category_parent_id' => 71, 'name' => 'Teatro']);
        factory(Category::class,1)->create([ 'category_parent_id' => 71, 'name' => 'Teoría musical']);
        factory(Category::class,1)->create([ 'category_parent_id' => 71, 'name' => 'Historia digital del Arte']);




    }
}
