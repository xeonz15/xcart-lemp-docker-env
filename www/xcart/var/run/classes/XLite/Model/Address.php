<?php
namespace XLite\Model;
/**
 * Address model
 *
 * @Entity
 * @Table  (name="profile_addresses",
 *      indexes={
 *          @Index (name="is_billing", columns={"is_billing"}),
 *          @Index (name="is_shipping", columns={"is_shipping"})
 *      }
 * )
 * @HasLifecycleCallbacks
 */
class Address extends \XLite\Module\XC\Geolocation\Model\Address {}