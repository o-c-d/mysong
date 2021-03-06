<?php

namespace Mysong\CoreBundle\DataFixtures\PHPCR;

use Doctrine\ODM\PHPCR\DocumentManager;
use Nelmio\Alice\Fixtures;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use PHPCR\Util\NodeHelper;
use Symfony\Cmf\Bundle\MenuBundle\Doctrine\Phpcr\MenuNode;

/**
 * Loads the initial demo data of the demo website.
 */
class LoadMysongCoreData implements FixtureInterface
{
    /**
     * Load data fixtures with the passed DocumentManager
     *
     * @param DocumentManager $manager
     */
    public function load(ObjectManager $manager)
    {
        if (!$manager instanceof DocumentManager) {
            $class = get_class($manager);
            throw new \RuntimeException("Fixture requires a PHPCR ODM DocumentManager instance, instance of '$class' given.");
        }

        // tweak homepage
        $page = $manager->find(null, '/cms/simple');
        $page->setBody('Hello');
        $page->setDefault('_template', 'MysongCoreBundle::home.html.twig');

        // add menu item for home
        $menuRoot = $manager->find(null, '/cms/simple');
        $homeMenuNode = new MenuNode('home');
        $homeMenuNode->setLabel('Home');
        $homeMenuNode->setParentDocument($menuRoot);
        $homeMenuNode->setContent($page);

        $manager->persist($homeMenuNode);

        // load the pages
        Fixtures::load(array(__DIR__.'/../../Resources/data/pages.yml'), $manager);

        // add menu item for user login
        $loginMenuNode = new MenuNode('user_login');
        $loginMenuNode->setLabel('User Login');
        $loginMenuNode->setParentDocument($menuRoot);
        $loginMenuNode->setRoute('fos_user_security_login');

        $manager->persist($loginMenuNode);

        // add menu item for admin login
        $loginMenuNode = new MenuNode('admin_login');
        $loginMenuNode->setLabel('Admin Login');
        $loginMenuNode->setParentDocument($menuRoot);
        $loginMenuNode->setRoute('sonata_user_admin_security_login');

        $manager->persist($loginMenuNode);

        // load the blocks
        NodeHelper::createPath($manager->getPhpcrSession(), '/cms/content/blocks');
        Fixtures::load(array(__DIR__.'/../../Resources/data/blocks.yml'), $manager);

        // save the changes
        $manager->flush();
    }
}
