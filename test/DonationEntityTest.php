<?php
/*
Copyright (c) 2009 BeVolunteer

This file is part of BW Rox.

BW Rox is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

BW Rox is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, see <http://www.gnu.org/licenses/> or 
write to the Free Software Foundation, Inc., 59 Temple Place - Suite 330, 
Boston, MA  02111-1307, USA.
*/

    /**
     * @package    Tests
     * @subpackage EntityTests
     * @author     Fake51
     * @copyright  2009 BeVolunteer
     * @license    http://www.gnu.org/licenses/gpl-2.0.html GPL 2
     * @link       http://www.bewelcome.org
     */

    /**
     * tests the Donation entity class
     *
     * @package    Tests
     * @subpackage EntityTests
     * @author     Fake51
     */

require_once("PHPUnit/Framework.php");

class DonationEntityTest extends PHPUnit_Framework_TestCase
{
    protected $entity_factory;

    public function setUp()
    {
        require_once 'core_includes.php';
        $this->entity_factory = new RoxEntityFactory;
    }

    public function testCreation()
    {
        $donation = $this->entity_factory->create('Donation');
        $this->assertEquals(true, $donation instanceof Donation);
        $this->assertEquals(true, $donation instanceof RoxEntityBase);
    }

}
