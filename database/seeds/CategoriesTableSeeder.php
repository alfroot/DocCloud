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

        $category = new Category;
        $category->name = 'Root';
        $category->description = 'Root';
        $category->user_id= 1 ;
        $category->accepted="1";
        $category->save();

        $category = new Category;
        $category->name = 'DocCloud Descategorizados';
        $category->description = 'Categoria para los documentos descategorizados';
        $category->category_parent_id = 1;
        $category->user_id=1;
        $category->accepted="1";
        $category->save();


        $category = new Category;
        $category->name = 'Deportes';
        $category->description = 'Categoria Deportiva';
        $category->category_parent_id = 1;
        $category->user_id =1 ;
        $category->accepted="1";
        $category->save();



        $category = new Category;
        $category->name = 'Ciencias';
        $category->description = 'Categoria de Ciencias';
        $category->category_parent_id = 1;
        $category->user_id=1;
        $category->accepted="1";
        $category->save();


        //Childs Deportes
        factory(Category::class,1)->create([ 'category_parent_id' => 3, 'name' => 'Acampada y senderismo']);
        factory(Category::class,1)->create([ 'category_parent_id' => 3, 'name' => 'Baloncesto']);
        factory(Category::class,1)->create([ 'category_parent_id' => 3, 'name' => 'Ciclismo']);
        factory(Category::class,1)->create([ 'category_parent_id' => 3, 'name' => 'Coleccionismo deportivo']);
        factory(Category::class,1)->create([ 'category_parent_id' => 3, 'name' => 'Deportes acuáticos']);
        factory(Category::class,1)->create([ 'category_parent_id' => 3, 'name' => 'Equitación']);
        factory(Category::class,1)->create([ 'category_parent_id' => 3, 'name' => 'Escalada y trekking']);
        factory(Category::class,1)->create([ 'category_parent_id' => 3, 'name' => 'Fórmula 1 y motociclismo']);
        factory(Category::class,1)->create([ 'category_parent_id' => 3, 'name' => 'Fútbol']);
        factory(Category::class,1)->create([ 'category_parent_id' => 3, 'name' => 'Gimnasia deportiva y rítmica']);
        factory(Category::class,1)->create([ 'category_parent_id' => 3, 'name' => 'Golf']);
        factory(Category::class,1)->create([ 'category_parent_id' => 3, 'name' => 'Montaña y esquí']);
        factory(Category::class,1)->create([ 'category_parent_id' => 3, 'name' => 'Otros deportes']);

        //Childs Ciencias
        factory(Category::class,1)->create([ 'category_parent_id' => 4, 'name' => 'Ciencias aplicadas‎']);
        factory(Category::class,1)->create([ 'category_parent_id' => 4, 'name' => 'Ciencias formales‎']);
        factory(Category::class,1)->create([ 'category_parent_id' => 4, 'name' => 'Ciencias naturales‎']);
        factory(Category::class,1)->create([ 'category_parent_id' => 4, 'name' => 'Ciencias sociales‎']);


        //Childs Ciencias aplicadas‎
        factory(Category::class,1)->create([ 'category_parent_id' => 18, 'name' => 'Ciencias de la salud']);
        factory(Category::class,1)->create([ 'category_parent_id' => 18, 'name' => 'Ingenierías']);
        factory(Category::class,1)->create([ 'category_parent_id' => 18, 'name' => 'Pedagogía']);
        factory(Category::class,1)->create([ 'category_parent_id' => 18, 'name' => 'Sociología']);
        factory(Category::class,1)->create([ 'category_parent_id' => 18, 'name' => 'Tecnología']);
        factory(Category::class,1)->create([ 'category_parent_id' => 18, 'name' => 'Telecomunicaciones']);

        //Childs ciencias salud
        factory(Category::class,1)->create([ 'category_parent_id' => 22, 'name' => 'Alimentación']);
        factory(Category::class,1)->create([ 'category_parent_id' => 22, 'name' => 'Medicina']);
        factory(Category::class,1)->create([ 'category_parent_id' => 22, 'name' => 'Psicología']);
        factory(Category::class,1)->create([ 'category_parent_id' => 22, 'name' => 'Enfermería']);
        factory(Category::class,1)->create([ 'category_parent_id' => 22, 'name' => 'Medicina Veterinaria']);

        //Childs ingenierias
        factory(Category::class,1)->create([ 'category_parent_id' => 23, 'name' => 'Electricidad y Electrónica']);
        factory(Category::class,1)->create([ 'category_parent_id' => 23, 'name' => 'Informática']);
        factory(Category::class,1)->create([ 'category_parent_id' => 23, 'name' => 'Ingeniería aeronáutica']);
        factory(Category::class,1)->create([ 'category_parent_id' => 23, 'name' => 'Ingeniería Civil']);
        factory(Category::class,1)->create([ 'category_parent_id' => 23, 'name' => 'Ingeniería del conocimiento']);
        factory(Category::class,1)->create([ 'category_parent_id' => 23, 'name' => 'Ingeniería Mecatrónica']);
        factory(Category::class,1)->create([ 'category_parent_id' => 23, 'name' => 'Ingeniería mecánica']);
        factory(Category::class,1)->create([ 'category_parent_id' => 23, 'name' => 'Ingeniería química']);
        factory(Category::class,1)->create([ 'category_parent_id' => 23, 'name' => 'Ingeniería de fabricación']);
        factory(Category::class,1)->create([ 'category_parent_id' => 23, 'name' => 'Las Interfaces de Usuario']);


        //Childs Ciencias formales
        factory(Category::class,1)->create([ 'category_parent_id' => 19, 'name' => 'Estadística']);
        factory(Category::class,1)->create([ 'category_parent_id' => 19, 'name' => 'Libros de Matemática']);

        //Childs Ciencias naturaes
        factory(Category::class,1)->create([ 'category_parent_id' => 20, 'name' => 'Astronomía']);
        factory(Category::class,1)->create([ 'category_parent_id' => 20, 'name' => 'Biología']);
        factory(Category::class,1)->create([ 'category_parent_id' => 20, 'name' => 'Ciencias de la Tierra']);
        factory(Category::class,1)->create([ 'category_parent_id' => 20, 'name' => 'Ecología']);
        factory(Category::class,1)->create([ 'category_parent_id' => 20, 'name' => 'Física']);
        factory(Category::class,1)->create([ 'category_parent_id' => 20, 'name' => 'Geografía']);
        factory(Category::class,1)->create([ 'category_parent_id' => 20, 'name' => 'Química']);

        //Childs Ciencias sociales
        factory(Category::class,1)->create([ 'category_parent_id' => 21, 'name' => 'Administración']);
        factory(Category::class,1)->create([ 'category_parent_id' => 21, 'name' => 'Comunicación']);
        factory(Category::class,1)->create([ 'category_parent_id' => 21, 'name' => 'Contabilidad']);
        factory(Category::class,1)->create([ 'category_parent_id' => 21, 'name' => 'Derecho']);
        factory(Category::class,1)->create([ 'category_parent_id' => 21, 'name' => 'Desarrollo Social']);
        factory(Category::class,1)->create([ 'category_parent_id' => 21, 'name' => 'Economía']);
        factory(Category::class,1)->create([ 'category_parent_id' => 21, 'name' => 'Educación']);
        factory(Category::class,1)->create([ 'category_parent_id' => 21, 'name' => 'Filosofía']);
        factory(Category::class,1)->create([ 'category_parent_id' => 21, 'name' => 'Geografía']);
        factory(Category::class,1)->create([ 'category_parent_id' => 21, 'name' => 'Historia']);
        factory(Category::class,1)->create([ 'category_parent_id' => 21, 'name' => 'Lingüística']);
        factory(Category::class,1)->create([ 'category_parent_id' => 21, 'name' => 'Religión']);
        factory(Category::class,1)->create([ 'category_parent_id' => 21, 'name' => 'Educación democrática']);
        factory(Category::class,1)->create([ 'category_parent_id' => 21, 'name' => 'Quehacer científico']);

        //Childs Administracion
        factory(Category::class,1)->create([ 'category_parent_id' => 52, 'name' => 'Administración de costos']);
        factory(Category::class,1)->create([ 'category_parent_id' => 52, 'name' => 'Administración de empresas']);
        factory(Category::class,1)->create([ 'category_parent_id' => 52, 'name' => 'Administración de tiempo']);
        factory(Category::class,1)->create([ 'category_parent_id' => 52, 'name' => 'Complementos de los cursos']);
        factory(Category::class,1)->create([ 'category_parent_id' => 52, 'name' => 'Diseño organizacional']);
        factory(Category::class,1)->create([ 'category_parent_id' => 52, 'name' => 'Estadística para los negocios']);

        //Arte
        factory(Category::class,1)->create([ 'category_parent_id' => 1, 'name' => 'Arte']);

        factory(Category::class,1)->create([ 'category_parent_id' => 72, 'name' => 'Arquitectura']);
        factory(Category::class,1)->create([ 'category_parent_id' => 72, 'name' => 'Arte precolombino']);
        factory(Category::class,1)->create([ 'category_parent_id' => 72, 'name' => 'Catálogo de obras de Erminio Blotta']);
        factory(Category::class,1)->create([ 'category_parent_id' => 72, 'name' => 'Circo']);
        factory(Category::class,1)->create([ 'category_parent_id' => 72, 'name' => 'Dibujo']);
        factory(Category::class,1)->create([ 'category_parent_id' => 72, 'name' => 'Fotografía']);
        factory(Category::class,1)->create([ 'category_parent_id' => 72, 'name' => 'Literatura']);
        factory(Category::class,1)->create([ 'category_parent_id' => 72, 'name' => 'Manga']);
        factory(Category::class,1)->create([ 'category_parent_id' => 72, 'name' => 'Música']);
        factory(Category::class,1)->create([ 'category_parent_id' => 72, 'name' => 'Origami']);
        factory(Category::class,1)->create([ 'category_parent_id' => 72, 'name' => 'Teatro']);
        factory(Category::class,1)->create([ 'category_parent_id' => 72, 'name' => 'Teoría musical']);
        factory(Category::class,1)->create([ 'category_parent_id' => 72, 'name' => 'Historia digital del Arte']);



    }
}
