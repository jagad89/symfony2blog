<?php
namespace Blog\ModelBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Blog\ModelBundle\Entity\Post;

/**
 * Fixtures for Post Entity.
 */
class Posts extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function getOrder() {
        return 15;
    }

    public function load(ObjectManager $manager) {
        $p1 = new Post();
        $p1->setTitle("Lorem ipsum post one");
        $p1->setBody("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sollicitudin vel eros in congue. In consequat turpis velit, pretium imperdiet nisl imperdiet a. In pharetra risus eu enim rutrum pulvinar. Duis tincidunt enim id urna eleifend molestie. In mattis vel sapien non dignissim. Sed pellentesque nisl vel odio sagittis sagittis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla eget tellus eget mi ultrices volutpat. Cras tempor scelerisque nibh, in posuere dolor suscipit sit amet.

Donec id lectus et elit dictum tincidunt in malesuada leo. Vestibulum eu tincidunt dui. Integer ut metus non est pulvinar consequat et vitae turpis. Sed feugiat id metus eget accumsan. Nam bibendum magna at erat tempor tristique. Proin accumsan sollicitudin ligula, a bibendum nulla dictum sed. Duis non risus a dui consequat sagittis. Ut luctus velit ut tortor molestie ullamcorper. Etiam accumsan eleifend dignissim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id pretium ipsum. Sed ac pharetra dui. Integer luctus, neque vel adipiscing pulvinar, massa nibh semper justo, vitae consequat sem dui et mi.");
        $p1->setAuthor($this->getAuthor($manager,'Bhavin'));
        
        $p2 = new Post();
        $p2->setTitle("Lorem ipsum post two");
        $p2->setBody("Nullam vehicula sem ligula. Suspendisse sed odio dolor. Aenean pretium mi magna, nec elementum tortor vulputate id. Vivamus ultricies tellus suscipit eros tempus, nec ultricies velit aliquam. Praesent dignissim nulla est, quis accumsan sem facilisis adipiscing. Sed aliquet nunc felis, sed fringilla libero feugiat sed. Duis feugiat non lectus at tempor. In consequat dolor vitae justo dignissim dignissim. Sed eleifend, elit id interdum sollicitudin, lectus justo ultrices turpis, eget pretium augue metus sit amet arcu. Etiam a placerat arcu. Morbi lacus eros, mattis vel dolor viverra, aliquet convallis justo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.

Nam in dui volutpat mauris scelerisque varius. Sed at posuere nibh. Aenean sit amet sem tempus, pellentesque tellus sed, iaculis urna. Ut congue bibendum massa in mattis. Aliquam feugiat est interdum, consequat elit id, consectetur eros. Nulla vitae porttitor nunc. Sed mollis scelerisque mattis. Mauris rutrum urna arcu, sit amet dictum tortor gravida sed. Praesent a massa eu dolor luctus volutpat in in lacus. Pellentesque mauris eros, mattis in pretium quis, tempus a lectus. Sed est nibh, euismod a consectetur blandit, pulvinar non lectus. Integer pellentesque ligula in massa rutrum, eget ullamcorper sapien tristique. Fusce suscipit viverra quam vel tempus. Sed dignissim sollicitudin risus, in porttitor lacus ultrices eget. Maecenas in dapibus ligula.");
        $p2->setAuthor($this->getAuthor($manager,'Hardik'));
        
        $p3 = new Post();
        $p3->setTitle("Lorem ipsum post two");
        $p3->setBody("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec imperdiet in nisl a commodo. Nullam dapibus sapien enim, sed posuere dolor semper quis. Nulla tempor, risus vel placerat congue, dui mi sollicitudin sapien, sit amet hendrerit nulla arcu sed risus. Praesent sed mattis odio, vel rhoncus massa. Vestibulum pretium varius consectetur. Sed at lacus non augue interdum mollis sed lobortis ipsum. Duis a felis eget ligula varius pharetra. Vestibulum lectus massa, iaculis non ligula sed, laoreet sagittis diam. Praesent eu mauris id sapien dapibus sollicitudin quis ac eros. Nam cursus auctor arcu, sed adipiscing velit aliquet in.

Praesent tristique est id arcu pulvinar aliquet. Donec massa tortor, gravida nec nulla non, vulputate iaculis tellus. Mauris nec nisl et elit convallis iaculis. Morbi vitae mauris nisl. In hac habitasse platea dictumst. Suspendisse fringilla mi a nibh cursus, et vestibulum diam bibendum. Donec malesuada, nibh at elementum vehicula, dolor orci laoreet dui, a vestibulum orci elit ut orci. Suspendisse viverra justo non mi ultrices tincidunt. Phasellus ut ullamcorper nibh, nec malesuada arcu.");
        $p3->setAuthor($this->getAuthor($manager,'Amit'));
        
        $manager->persist($p1);
        $manager->persist($p2);
        $manager->persist($p3);
        
        $manager->flush();
    }
    
    public function getAuthor(ObjectManager $manager,$name)
    {
       return $manager->getRepository('ModelBundle:Author')->findOneBy(array('name'=>$name));
    }

}