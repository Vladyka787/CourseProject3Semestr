<?php

namespace App\DataFixtures;

use App\Entity\Bay;
use App\Entity\Client;
use App\Entity\Custom;
use App\Entity\Material;
use App\Entity\Service;
use App\Entity\TypeOfWork;
use App\Entity\Worker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $client1 = new Client();
        $client1->setCustomerFirstName('Иван');
        $client1->setCustomerMiddleName('Иванов');
        $client1->setCustomerLastName('Иванович');
        $client1->setCustomerPhone('88005553535');

        $client2 = new Client();
        $client2->setCustomerFirstName('Илья');
        $client2->setCustomerMiddleName('Соколов');
        $client2->setCustomerLastName('Дмитриевич');
        $client2->setCustomerPhone('89547861596');

        $client3 = new Client();
        $client3->setCustomerFirstName('Дмитрий');
        $client3->setCustomerMiddleName('Бурундуков');
        $client3->setCustomerLastName('Игоревич');
        $client3->setCustomerPhone('89421867645');

        $client4 = new Client();
        $client4->setCustomerFirstName('Игорь');
        $client4->setCustomerMiddleName('Ласточкин');
        $client4->setCustomerLastName('Иванович');
        $client4->setCustomerPhone('89547612354');


        $custom1 = new Custom();
        $custom1->setCarInformation('Kia Sorento Серый Седан');
        $custom1->setOrderDate(date_create_from_format('Y-m-d', '2020-11-05'));
        $custom1->setOrderPayDate(date_create_from_format('Y-m-d', '2020-11-07'));
        $custom1->setOrderEndDate(date_create_from_format('Y-m-d', '2020-11-14'));

        $custom2 = new Custom();
        $custom2->setCarInformation('Kia Sorento Серый Седан');
        $custom2->setOrderDate(date_create_from_format('Y-m-d', '2021-03-18'));
        $custom2->setOrderPayDate(date_create_from_format('Y-m-d', '2021-03-18'));
        $custom2->setOrderEndDate(date_create_from_format('Y-m-d', '2021-04-18'));

        $custom3 = new Custom();
        $custom3->setCarInformation('Mazda CX5 Красный Внедорожник');
        $custom3->setOrderDate(date_create_from_format('Y-m-d', '2021-08-09'));
        $custom3->setOrderPayDate(date_create_from_format('Y-m-d', '2021-08-09'));
        $custom3->setOrderEndDate(date_create_from_format('Y-m-d', '2021-12-09'));

        $custom4 = new Custom();
        $custom4->setCarInformation('Mercedes-Benz GLC Coupe Синий Внедорожник');
        $custom4->setOrderDate(date_create_from_format('Y-m-d', '2020-11-08'));
        $custom4->setOrderPayDate(date_create_from_format('Y-m-d', '2020-11-08'));
        $custom4->setOrderEndDate(date_create_from_format('Y-m-d', '2020-11-28'));

        $custom5 = new Custom();
        $custom5->setCarInformation('Mercedes-Benz GLC Coupe Синий Внедорожник');
        $custom5->setOrderDate(date_create_from_format('Y-m-d', '2021-02-13'));
        $custom5->setOrderPayDate(date_create_from_format('Y-m-d', '2021-02-15'));
        $custom5->setOrderEndDate(date_create_from_format('Y-m-d', '2021-02-25'));

        $custom6 = new Custom();
        $custom6->setCarInformation('Renault Logan Красный Седан');
        $custom6->setOrderDate(date_create_from_format('Y-m-d', '2021-12-17'));
        $custom6->setOrderPayDate(date_create_from_format('Y-m-d', '2021-12-17'));
//        $custom6->setOrderEndDate(date_create_from_format('Y-m-d', ''));

        $custom7 = new Custom();
        $custom7->setCarInformation('Daewoo Matiz Серый Хэтчбек');
        $custom7->setOrderDate(date_create_from_format('Y-m-d', '2021-12-18'));
//        $custom7->setOrderPayDate(date_create_from_format('Y-m-d', ''));
//        $custom7->setOrderEndDate(date_create_from_format('Y-m-d', ''));

        $custom8 = new Custom();
        $custom8->setCarInformation('Nissan Juke Изумрудный Внедорожник');
        $custom8->setOrderDate(date_create_from_format('Y-m-d', '2020-04-20'));
        $custom8->setOrderPayDate(date_create_from_format('Y-m-d', '2020-04-24'));
        $custom8->setOrderEndDate(date_create_from_format('Y-m-d', '2020-05-01'));

        $custom9 = new Custom();
        $custom9->setCarInformation('Mitsubishi Eclipse Желтый Кабриолет');
        $custom9->setOrderDate(date_create_from_format('Y-m-d', '2019-10-18'));
        $custom9->setOrderPayDate(date_create_from_format('Y-m-d', '2019-10-18'));
        $custom9->setOrderEndDate(date_create_from_format('Y-m-d', '2019-10-25'));

        $custom10 = new Custom();
        $custom10->setCarInformation('Ford Focus Белый Универсал');
        $custom10->setOrderDate(date_create_from_format('Y-m-d', '2021-05-17'));
        $custom10->setOrderPayDate(date_create_from_format('Y-m-d', '2021-06-01'));
        $custom10->setOrderEndDate(date_create_from_format('Y-m-d', '2021-06-09'));


        $bay1 = new Bay();
        $bay1->setBayType('Покрасочный');

        $bay2 = new Bay();
        $bay2->setBayType('Обычный');


        $typeOfWork1 = new TypeOfWork();
        $typeOfWork1->setTypeOfWorkName('Покраска');
        $typeOfWork1->setTypeOfWorkSkills('Красить элементы автомобиля/автомобиль полность,
         полировка автомобиля или отдельных элементов');

        $typeOfWork2 = new TypeOfWork();
        $typeOfWork2->setTypeOfWorkName('Жестянка');
        $typeOfWork2->setTypeOfWorkSkills('Выправка элементов, снятие/установка детали на авто');


        $worker1 = new Worker();
        $worker1->setWorkerFirstName('Михаил');
        $worker1->setWorkerMiddleName('Земляков');
        $worker1->setWorkerLastName('Петрович');
        $worker1->setWorkerPhone('89718432154');

        $worker2 = new Worker();
        $worker2->setWorkerFirstName('Иван');
        $worker2->setWorkerMiddleName('Хмурый');
        $worker2->setWorkerLastName('Алексеевич');
        $worker2->setWorkerPhone('87456194515');

        $worker3 = new Worker();
        $worker3->setWorkerFirstName('Григорий');
        $worker3->setWorkerMiddleName('Маляров');
        $worker3->setWorkerLastName('Анатольевич');
        $worker3->setWorkerPhone('87469445315');

        $worker4 = new Worker();
        $worker4->setWorkerFirstName('Андрей');
        $worker4->setWorkerMiddleName('Чумаков');
        $worker4->setWorkerLastName('Павлович');
        $worker4->setWorkerPhone('87494543185');


        $service1= new Service();
        $service1->setServiceCompleteDate(date_create_from_format('Y-m-d', '2019-10-22'));
        $service1->setServiceDescription('Покраска в желтый крыло переднее правое');
        $service1->setServicePrice('8000.00');

        $service2= new Service();
        $service2->setServiceCompleteDate(date_create_from_format('Y-m-d', '2019-10-25'));
        $service2->setServiceDescription('Полировка крыло переднее правое');
        $service2->setServicePrice('5000.00');

        $service3= new Service();
        $service3->setServiceCompleteDate(date_create_from_format('Y-m-d', '2020-04-27'));
        $service3->setServiceDescription('Выправка преденего бампера');
        $service3->setServicePrice('2000.00');

        $service4= new Service();
        $service4->setServiceCompleteDate(date_create_from_format('Y-m-d', '2020-05-01'));
        $service4->setServiceDescription('Замена капота');
        $service4->setServicePrice('4000.00');

        $service5= new Service();
        $service5->setServiceCompleteDate(date_create_from_format('Y-m-d', '2020-04-28'));
        $service5->setServiceDescription('Замена передних фар');
        $service5->setServicePrice('12000.00');

        $service6= new Service();
        $service6->setServiceCompleteDate(date_create_from_format('Y-m-d', '2020-11-14'));
        $service6->setServiceDescription('Покраска машины');
        $service6->setServicePrice('40000.00');

        $service7= new Service();
        $service7->setServiceCompleteDate(date_create_from_format('Y-m-d', '2020-11-09'));
        $service7->setServiceDescription('Установка багажник');
        $service7->setServicePrice('4200.00');

        $service8= new Service();
        $service8->setServiceCompleteDate(date_create_from_format('Y-m-d', '2020-11-14'));
        $service8->setServiceDescription('Удаление перендний бампер');
        $service8->setServicePrice('1500.00');

        $service9= new Service();
        $service9->setServiceCompleteDate(date_create_from_format('Y-m-d', '2020-11-28'));
        $service9->setServiceDescription('Покраска в синий багажник');
        $service9->setServicePrice('10000.00');

        $service10= new Service();
        $service10->setServiceCompleteDate(date_create_from_format('Y-m-d', '2021-02-17'));
        $service10->setServiceDescription('Установка переднйи бампер');
        $service10->setServicePrice('3000.00');

        $service11= new Service();
        $service11->setServiceCompleteDate(date_create_from_format('Y-m-d', '2021-02-25'));
        $service11->setServiceDescription('Покраска переднйи бампер');
        $service11->setServicePrice('7000.00');

        $service12= new Service();
        $service12->setServiceCompleteDate(date_create_from_format('Y-m-d', '2021-04-18'));
        $service12->setServiceDescription('Замена лобовое стекло');
        $service12->setServicePrice('11500.00');

        $service13= new Service();
        $service13->setServiceCompleteDate(date_create_from_format('Y-m-d', '2021-06-09'));
        $service13->setServiceDescription('Полировка машины');
        $service13->setServicePrice('20000.00');

        $service14= new Service();
        $service14->setServiceCompleteDate(date_create_from_format('Y-m-d', '2021-12-09'));
        $service14->setServiceDescription('Замена дверей');
        $service14->setServicePrice('15000.00');

        $service15= new Service();
//        $service15->setServiceCompleteDate(date_create_from_format('Y-m-d', ''));
        $service15->setServiceDescription('Покраска машины в синий');
        $service15->setServicePrice('65000.00');


        $material1=new Material();
        $material1->setMaterialName('Краска желтая');
        $material1->setMaterialPrice('2000.00');
        $material1->setMaterialDescription('Краска качественная');
        $material1->setMaterialAmount(1000);
        $material1->setMaterialMeasure('мл');

        $material2=new Material();
        $material2->setMaterialName('Растворитель');
        $material2->setMaterialPrice('500.00');
        $material2->setMaterialDescription('Растворитель обычный');
        $material2->setMaterialAmount(150);
        $material2->setMaterialMeasure('мл');

        $material3=new Material();
        $material3->setMaterialName('Грунтовка');
        $material3->setMaterialPrice('600.00');
        $material3->setMaterialDescription('Грунтовка обычная');
        $material3->setMaterialAmount(400);
        $material3->setMaterialMeasure('гр');

        $material4=new Material();
        $material4->setMaterialName('Полировальный порошок');
        $material4->setMaterialPrice('2000.00');
//        $material4->setMaterialDescription('');
        $material4->setMaterialAmount(1000);
        $material4->setMaterialMeasure('гр');

        $material5=new Material();
        $material5->setMaterialName('Полировальные круги');
        $material5->setMaterialPrice('1000.00');
//        $material5->setMaterialDescription('');
        $material5->setMaterialAmount(1000);
        $material5->setMaterialMeasure('гр');

        $material6=new Material();
        $material6->setMaterialName('Краска серая');
        $material6->setMaterialPrice('8000.00');
        $material6->setMaterialDescription('Краска обычная');
        $material6->setMaterialAmount(4000);
        $material6->setMaterialMeasure('мл');

        $material7=new Material();
        $material7->setMaterialName('Грунтовка');
        $material7->setMaterialPrice('2000.00');
        $material7->setMaterialDescription('Грунтовка качественная');
        $material7->setMaterialAmount(2000);
        $material7->setMaterialMeasure('гр');

        $material8=new Material();
        $material8->setMaterialName('Растворитель');
        $material8->setMaterialPrice('1500.00');
        $material8->setMaterialDescription('Растворитель обычный');
        $material8->setMaterialAmount(1000);
        $material8->setMaterialMeasure('мл');

        $material9=new Material();
        $material9->setMaterialName('Краска синяя');
        $material9->setMaterialPrice('2000.00');
        $material9->setMaterialDescription('Краска обычная');
        $material9->setMaterialAmount(800);
        $material9->setMaterialMeasure('мл');

        $material10=new Material();
        $material10->setMaterialName('Грунтовка');
        $material10->setMaterialPrice('500.00');
        $material10->setMaterialDescription('Грунтовка обычная');
        $material10->setMaterialAmount(500);
        $material10->setMaterialMeasure('гр');

        $material11=new Material();
        $material11->setMaterialName('Растворитель');
        $material11->setMaterialPrice('600.00');
        $material11->setMaterialDescription('Растворитель обычный');
        $material11->setMaterialAmount(200);
        $material11->setMaterialMeasure('мл');

        $material12=new Material();
        $material12->setMaterialName('Краска синяя');
        $material12->setMaterialPrice('2000.00');
        $material12->setMaterialDescription('Краска качественная');
        $material12->setMaterialAmount(900);
        $material12->setMaterialMeasure('мл');

        $material13=new Material();
        $material13->setMaterialName('Грунтовка');
        $material13->setMaterialPrice('1000.00');
        $material13->setMaterialDescription('Грунтовка качественная');
        $material13->setMaterialAmount(500);
        $material13->setMaterialMeasure('гр');

        $material14=new Material();
        $material14->setMaterialName('Растворитель');
        $material14->setMaterialPrice('600.00');
        $material14->setMaterialDescription('Растворитель обычный');
        $material14->setMaterialAmount(200);
        $material14->setMaterialMeasure('мл');

        $material15=new Material();
        $material15->setMaterialName('Полировальный порошок');
        $material15->setMaterialPrice('4000.00');
//        $material15->setMaterialDescription('');
        $material15->setMaterialAmount(3000);
        $material15->setMaterialMeasure('гр');

        $material16=new Material();
        $material16->setMaterialName('Полировальные круги');
        $material16->setMaterialPrice('3000.00');
//        $material16->setMaterialDescription('');
        $material16->setMaterialAmount(3);
        $material16->setMaterialMeasure('шт');

        $material17=new Material();
        $material17->setMaterialName('Краска синяя');
        $material17->setMaterialPrice('10000.00');
        $material17->setMaterialDescription('Краска качественная');
        $material17->setMaterialAmount(4000);
        $material17->setMaterialMeasure('мл');

        $material18=new Material();
        $material18->setMaterialName('Растворитель');
        $material18->setMaterialPrice('2000.00');
        $material18->setMaterialDescription('Растворитель обычный');
        $material18->setMaterialAmount(1500);
        $material18->setMaterialMeasure('мл');

        $material19=new Material();
        $material19->setMaterialName('Грунтовка');
        $material19->setMaterialPrice('2000.00');
        $material19->setMaterialDescription('Грунтовка качественная');
        $material19->setMaterialAmount(2000);
        $material19->setMaterialMeasure('гр');


        $custom1->setClient($client1);
        $client1->addCustom($custom1);

        $custom2->setClient($client1);
        $client1->addCustom($custom2);

        $custom3->setClient($client1);
        $client1->addCustom($custom3);

        $custom4->setClient($client2);
        $client2->addCustom($custom4);

        $custom5->setClient($client2);
        $client2->addCustom($custom5);

        $custom6->setClient($client3);
        $client3->addCustom($custom6);

        $custom7->setClient($client3);
        $client3->addCustom($custom7);

        $custom8->setClient($client4);
        $client4->addCustom($custom8);

        $custom9->setClient($client4);
        $client4->addCustom($custom9);

        $custom10->setClient($client4);
        $client4->addCustom($custom10);


        $service3->setCustom($custom8);
        $custom8->addService($service3);

        $service4->setCustom($custom8);
        $custom8->addService($service4);

        $service5->setCustom($custom8);
        $custom8->addService($service5);

        $service6->setCustom($custom1);
        $custom1->addService($service6);

        $service2->setCustom($custom9);
        $custom9->addService($service2);

        $service1->setCustom($custom9);
        $custom9->addService($service1);

        $service7->setCustom($custom4);
        $custom4->addService($service7);

        $service8->setCustom($custom4);
        $custom4->addService($service8);

        $service9->setCustom($custom4);
        $custom4->addService($service9);

        $service10->setCustom($custom5);
        $custom5->addService($service10);

        $service11->setCustom($custom5);
        $custom5->addService($service11);

        $service12->setCustom($custom2);
        $custom2->addService($service12);

        $service13->setCustom($custom10);
        $custom10->addService($service13);

        $service14->setCustom($custom3);
        $custom3->addService($service14);

        $service15->setCustom($custom6);
        $custom6->addService($service15);


        $service3->setBay($bay2);
        $bay2->addService($service3);

        $service4->setBay($bay2);
        $bay2->addService($service4);

        $service5->setBay($bay2);
        $bay2->addService($service5);

        $service6->setBay($bay1);
        $bay1->addService($service6);

        $service2->setBay($bay1);
        $bay1->addService($service2);

        $service1->setBay($bay1);
        $bay1->addService($service1);

        $service7->setBay($bay2);
        $bay2->addService($service7);

        $service8->setBay($bay2);
        $bay2->addService($service8);

        $service9->setBay($bay1);
        $bay1->addService($service9);

        $service10->setBay($bay2);
        $bay2->addService($service10);

        $service11->setBay($bay1);
        $bay1->addService($service11);

        $service12->setBay($bay2);
        $bay2->addService($service12);

        $service13->setBay($bay1);
        $bay1->addService($service1);

        $service14->setBay($bay2);
        $bay2->addService($service14);

        $service15->setBay($bay1);
        $bay1->addService($service15);


        $service3->setWorker($worker1);
        $worker1->addService($service3);

        $service4->setWorker($worker1);
        $worker1->addService($service4);

        $service5->setWorker($worker2);
        $worker2->addService($service5);

        $service6->setWorker($worker3);
        $worker3->addService($service6);

        $service2->setWorker($worker4);
        $worker4->addService($service2);

        $service1->setWorker($worker3);
        $worker3->addService($service1);

        $service7->setWorker($worker1);
        $worker1->addService($service7);

        $service8->setWorker($worker2);
        $worker2->addService($service8);

        $service9->setWorker($worker3);
        $worker3->addService($service9);

        $service10->setWorker($worker2);
        $worker2->addService($service10);

        $service11->setWorker($worker4);
        $worker4->addService($service11);

        $service12->setWorker($worker1);
        $worker1->addService($service12);

        $service13->setWorker($worker4);
        $worker4->addService($service13);

        $service14->setWorker($worker1);
        $worker1->addService($service14);

        $service15->setWorker($worker3);
        $worker3->addService($service15);


        $service3->setTypeOfWork($typeOfWork2);
        $typeOfWork2->addService($service3);

        $service4->setTypeOfWork($typeOfWork2);
        $typeOfWork2->addService($service4);

        $service5->setTypeOfWork($typeOfWork2);
        $typeOfWork2->addService($service5);

        $service6->setTypeOfWork($typeOfWork1);
        $typeOfWork1->addService($service6);

        $service2->setTypeOfWork($typeOfWork1);
        $typeOfWork1->addService($service2);

        $service1->setTypeOfWork($typeOfWork1);
        $typeOfWork1->addService($service1);

        $service7->setTypeOfWork($typeOfWork2);
        $typeOfWork2->addService($service7);

        $service8->setTypeOfWork($typeOfWork2);
        $typeOfWork2->addService($service8);

        $service9->setTypeOfWork($typeOfWork1);
        $typeOfWork1->addService($service9);

        $service10->setTypeOfWork($typeOfWork2);
        $typeOfWork2->addService($service10);

        $service11->setTypeOfWork($typeOfWork1);
        $typeOfWork1->addService($service11);

        $service12->setTypeOfWork($typeOfWork2);
        $typeOfWork2->addService($service12);

        $service13->setTypeOfWork($typeOfWork1);
        $typeOfWork1->addService($service13);

        $service14->setTypeOfWork($typeOfWork2);
        $typeOfWork2->addService($service14);

        $service15->setTypeOfWork($typeOfWork1);
        $typeOfWork1->addService($service15);


        $worker1->setBay($bay2);
        $bay2->addWorker($worker1);

        $worker2->setBay($bay2);
        $bay2->addWorker($worker2);

        $worker3->setBay($bay1);
        $bay1->addWorker($worker3);

        $worker4->setBay($bay1);
        $bay1->addWorker($worker4);


        $worker1->setTypeOfWork($typeOfWork2);
        $typeOfWork2->addWorker($worker1);

        $worker2->setTypeOfWork($typeOfWork2);
        $typeOfWork2->addWorker($worker2);

        $worker3->setTypeOfWork($typeOfWork1);
        $typeOfWork1->addWorker($worker3);

        $worker4->setTypeOfWork($typeOfWork1);
        $typeOfWork1->addWorker($worker4);


        $material1->setService($service1);
        $service1->addMaterial($material1);

        $material2->setService($service1);
        $service1->addMaterial($material2);

        $material3->setService($service1);
        $service1->addMaterial($material3);

        $material4->setService($service2);
        $service2->addMaterial($material4);

        $material5->setService($service2);
        $service2->addMaterial($material5);

        $material6->setService($service6);
        $service6->addMaterial($material6);

        $material7->setService($service6);
        $service6->addMaterial($material7);

        $material8->setService($service6);
        $service6->addMaterial($material8);

        $material9->setService($service9);
        $service9->addMaterial($material9);

        $material10->setService($service9);
        $service9->addMaterial($material10);

        $material11->setService($service9);
        $service9->addMaterial($material11);

        $material12->setService($service11);
        $service11->addMaterial($material12);

        $material13->setService($service11);
        $service11->addMaterial($material13);

        $material14->setService($service11);
        $service11->addMaterial($material14);

        $material15->setService($service13);
        $service13->addMaterial($material15);

        $material16->setService($service13);
        $service13->addMaterial($material16);

        $material17->setService($service15);
        $service15->addMaterial($material17);

        $material18->setService($service15);
        $service15->addMaterial($material18);

        $material19->setService($service15);
        $service15->addMaterial($material19);


        $manager->persist($client1);
        $manager->persist($client2);
        $manager->persist($client3);
        $manager->persist($client4);

        $manager->persist($bay1);
        $manager->persist($bay2);

        $manager->persist($custom1);
        $manager->persist($custom2);
        $manager->persist($custom3);
        $manager->persist($custom4);
        $manager->persist($custom5);
        $manager->persist($custom6);
        $manager->persist($custom7);
        $manager->persist($custom8);
        $manager->persist($custom9);
        $manager->persist($custom10);

        $manager->persist($typeOfWork1);
        $manager->persist($typeOfWork2);

        $manager->persist($worker1);
        $manager->persist($worker2);
        $manager->persist($worker3);
        $manager->persist($worker4);

        $manager->persist($service1);
        $manager->persist($service2);
        $manager->persist($service3);
        $manager->persist($service4);
        $manager->persist($service5);
        $manager->persist($service6);
        $manager->persist($service7);
        $manager->persist($service8);
        $manager->persist($service9);
        $manager->persist($service10);
        $manager->persist($service11);
        $manager->persist($service12);
        $manager->persist($service13);
        $manager->persist($service14);
        $manager->persist($service15);

        $manager->persist($material1);
        $manager->persist($material2);
        $manager->persist($material3);
        $manager->persist($material4);
        $manager->persist($material5);
        $manager->persist($material6);
        $manager->persist($material7);
        $manager->persist($material8);
        $manager->persist($material9);
        $manager->persist($material10);
        $manager->persist($material11);
        $manager->persist($material12);
        $manager->persist($material13);
        $manager->persist($material14);
        $manager->persist($material15);
        $manager->persist($material16);
        $manager->persist($material17);
        $manager->persist($material18);
        $manager->persist($material19);

        $manager->flush();
    }
}
