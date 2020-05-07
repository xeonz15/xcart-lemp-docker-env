# <?php if (!defined('LC_DS')) { die(); } ?>

CDev-Bestsellers:
    tables: {  }
    columns: {  }
    dependencies: {  }
CDev-ContactUs:
    tables: {  }
    columns: {  }
    dependencies: {  }
CDev-Coupons:
    tables: [coupon_products, order_coupons, coupons, product_class_coupons, membership_coupons, zone_coupons, coupon_categories]
    columns: {  }
    dependencies: {  }
CDev-Egoods:
    tables: [product_attachment_history_points, order_item_private_attachments]
    columns: { product_attachments: { private: 'private TINYINT(1) NOT NULL' } }
    dependencies: {  }
CDev-FeaturedProducts:
    tables: [featured_products]
    columns: {  }
    dependencies: {  }
CDev-FedEx:
    tables: {  }
    columns: {  }
    dependencies: {  }
CDev-FileAttachments:
    tables: [product_attachment_translations, product_attachments, product_attachment_storages]
    columns: {  }
    dependencies: {  }
CDev-GoSocial:
    tables: {  }
    columns: { product_translations: { ogMeta: 'ogMeta LONGTEXT DEFAULT NULL' }, sale_discounts: { useCustomOG: 'useCustomOG TINYINT(1) NOT NULL', ogMeta: 'ogMeta LONGTEXT DEFAULT NULL' }, sale_discount_translations: { ogMeta: 'ogMeta LONGTEXT DEFAULT NULL' }, categories: { ogMeta: 'ogMeta LONGTEXT DEFAULT NULL', useCustomOG: 'useCustomOG TINYINT(1) NOT NULL' }, products: { useCustomOG: 'useCustomOG TINYINT(1) NOT NULL' }, pages: { useCustomOG: 'useCustomOG TINYINT(1) NOT NULL', ogMeta: 'ogMeta LONGTEXT DEFAULT NULL', showSocialButtons: 'showSocialButtons TINYINT(1) NOT NULL' }, page_translations: { ogMeta: 'ogMeta LONGTEXT DEFAULT NULL' }, category_translations: { ogMeta: 'ogMeta LONGTEXT DEFAULT NULL' } }
    dependencies: { CDev-Sale: { sale_discounts: { useCustomOG: 'useCustomOG TINYINT(1) NOT NULL', ogMeta: 'ogMeta LONGTEXT DEFAULT NULL' }, sale_discount_translations: { ogMeta: 'ogMeta LONGTEXT DEFAULT NULL' } }, CDev-SimpleCMS: { pages: { useCustomOG: 'useCustomOG TINYINT(1) NOT NULL', ogMeta: 'ogMeta LONGTEXT DEFAULT NULL', showSocialButtons: 'showSocialButtons TINYINT(1) NOT NULL' }, page_translations: { ogMeta: 'ogMeta LONGTEXT DEFAULT NULL' } } }
CDev-GoogleAnalytics:
    tables: {  }
    columns: { profiles: { gaClientId: 'gaClientId VARCHAR(255) NOT NULL' }, order_items: { categoryAdded: 'categoryAdded VARCHAR(255) DEFAULT NULL' } }
    dependencies: {  }
CDev-MarketPrice:
    tables: {  }
    columns: { products: { marketPrice: 'marketPrice NUMERIC(14, 4) NOT NULL' } }
    dependencies: {  }
CDev-PINCodes:
    tables: [pin_codes]
    columns: { products: { pinCodesEnabled: 'pinCodesEnabled TINYINT(1) NOT NULL', autoPinCodes: 'autoPinCodes TINYINT(1) NOT NULL' } }
    dependencies: {  }
CDev-Paypal:
    tables: {  }
    columns: { profiles: { socialLoginProvider: 'socialLoginProvider VARCHAR(128) DEFAULT NULL', socialLoginId: 'socialLoginId VARCHAR(128) DEFAULT NULL' } }
    dependencies: {  }
CDev-ProductAdvisor:
    tables: [product_stats]
    columns: {  }
    dependencies: {  }
CDev-RuTranslation:
    tables: {  }
    columns: {  }
    dependencies: {  }
CDev-Sale:
    tables: [sale_discounts, product_class_sale_discounts, membership_sale_discounts, category_sale_discounts, sale_discount_translations, sale_discount_products]
    columns: { clean_urls: { sale_discount_id: 'sale_discount_id INT UNSIGNED DEFAULT NULL' }, products: { participateSale: 'participateSale TINYINT(1) NOT NULL', discountType: 'discountType VARCHAR(32) NOT NULL', salePriceValue: 'salePriceValue NUMERIC(14, 4) NOT NULL' } }
    dependencies: {  }
CDev-SimpleCMS:
    tables: [page_images, menu_quick_flags, pages, menu_translations, page_translations, menus]
    columns: { clean_urls: { page_id: 'page_id INT UNSIGNED DEFAULT NULL' } }
    dependencies: {  }
CDev-UserPermissions:
    tables: {  }
    columns: { roles: { enabled: 'enabled TINYINT(1) NOT NULL' } }
    dependencies: {  }
CDev-VolumeDiscounts:
    tables: [volume_discounts, zones_volume_discounts]
    columns: {  }
    dependencies: {  }
CDev-XMLSitemap:
    tables: {  }
    columns: {  }
    dependencies: {  }
Kliken-GoogleAds:
    tables: {  }
    columns: {  }
    dependencies: {  }
QSL-CloudSearch:
    tables: {  }
    columns: { categories: { csLastUpdate: 'csLastUpdate INT NOT NULL' }, products: { csLastUpdate: 'csLastUpdate INT NOT NULL' } }
    dependencies: {  }
QSL-FlyoutCategoriesMenu:
    tables: {  }
    columns: {  }
    dependencies: {  }
XC-BulkEditing:
    tables: {  }
    columns: { products: { xcPendingBulkEdit: 'xcPendingBulkEdit TINYINT(1) NOT NULL' } }
    dependencies: {  }
XC-Concierge:
    tables: {  }
    columns: { profiles: { conciergeUserId: 'conciergeUserId VARCHAR(128) DEFAULT NULL' } }
    dependencies: {  }
XC-CrispWhiteSkin:
    tables: {  }
    columns: {  }
    dependencies: {  }
XC-CustomOrderStatuses:
    tables: {  }
    columns: {  }
    dependencies: {  }
XC-CustomProductTabs:
    tables: [custom_global_tab_translation, custom_global_tabs, product_tabs, product_tab_translations]
    columns: { global_product_tabs: { enabled: 'enabled TINYINT(1) NOT NULL', link: 'link VARCHAR(255) DEFAULT NULL' } }
    dependencies: {  }
XC-CustomerAttachments:
    tables: [customer_attachments_storage]
    columns: { products: { isCustomerAttachmentsAvailable: 'isCustomerAttachmentsAvailable TINYINT(1) NOT NULL', isCustomerAttachmentsRequired: 'isCustomerAttachmentsRequired TINYINT(1) NOT NULL' } }
    dependencies: {  }
XC-FacebookMarketing:
    tables: {  }
    columns: { products: { facebookMarketingEnabled: 'facebookMarketingEnabled TINYINT(1) DEFAULT ''1'' NOT NULL' } }
    dependencies: {  }
XC-FastLaneCheckout:
    tables: {  }
    columns: {  }
    dependencies: {  }
XC-FreeShipping:
    tables: {  }
    columns: { products: { freeShip: 'freeShip TINYINT(1) NOT NULL', shipForFree: 'shipForFree TINYINT(1) NOT NULL', freightFixedFee: 'freightFixedFee NUMERIC(14, 4) NOT NULL' }, shipping_methods: { free: 'free TINYINT(1) NOT NULL' } }
    dependencies: {  }
XC-FroalaEditor:
    tables: {  }
    columns: {  }
    dependencies: {  }
XC-Geolocation:
    tables: {  }
    columns: {  }
    dependencies: {  }
XC-GoogleFeed:
    tables: {  }
    columns: { attributes: { googleShoppingGroup: 'googleShoppingGroup VARCHAR(255) DEFAULT NULL' }, products: { googleFeedEnabled: 'googleFeedEnabled TINYINT(1) DEFAULT ''1'' NOT NULL' } }
    dependencies: {  }
XC-MailChimp:
    tables: [mailchimp_list_group_name, mailchimp_profile_interests, mailchimp_store, mailchimp_list_segments, segment_membership, segment_products, mailchimp_segment_subscriptions, mailchimp_list_group, mailchimp_lists, mailchimp_subscriptions]
    columns: { orders: { mailchimpStoreId: 'mailchimpStoreId VARCHAR(255) NOT NULL' }, products: { useAsSegmentCondition: 'useAsSegmentCondition TINYINT(1) NOT NULL' } }
    dependencies: {  }
XC-News:
    tables: [news, news_message_translations]
    columns: { clean_urls: { news_message_id: 'news_message_id INT UNSIGNED DEFAULT NULL' } }
    dependencies: {  }
XC-NewsletterSubscriptions:
    tables: [newsletter_subscriptions_subscribers]
    columns: {  }
    dependencies: {  }
XC-NotFinishedOrders:
    tables: {  }
    columns: { orders: { not_finished_order_id: 'not_finished_order_id INT DEFAULT NULL' } }
    dependencies: {  }
XC-Onboarding:
    tables: {  }
    columns: { orders: { demo: 'demo TINYINT(1) NOT NULL' }, categories: { demo: 'demo TINYINT(1) NOT NULL' }, products: { demo: 'demo TINYINT(1) NOT NULL' } }
    dependencies: {  }
XC-ProductComparison:
    tables: {  }
    columns: {  }
    dependencies: {  }
XC-ProductFilter:
    tables: [category_class_links]
    columns: { attributes: { visible: 'visible TINYINT(1) DEFAULT ''1'' NOT NULL' }, categories: { useClasses: 'useClasses CHAR(1) NOT NULL' } }
    dependencies: {  }
XC-ProductTags:
    tables: [tag_translations, product_tags, tags]
    columns: {  }
    dependencies: {  }
XC-Qiwi:
    tables: {  }
    columns: {  }
    dependencies: {  }
XC-RESTAPI:
    tables: {  }
    columns: {  }
    dependencies: {  }
XC-Reviews:
    tables: [reviews, order_review_keys]
    columns: {  }
    dependencies: {  }
XC-Robokassa:
    tables: {  }
    columns: { tax_classes: { robokassaVATRate: 'robokassaVATRate VARCHAR(32) NOT NULL' } }
    dependencies: {  }
XC-Sitemap:
    tables: {  }
    columns: {  }
    dependencies: {  }
XC-ThemeTweaker:
    tables: [theme_tweaker_template]
    columns: {  }
    dependencies: {  }
XC-UPS:
    tables: {  }
    columns: {  }
    dependencies: {  }
XC-UpdateInventory:
    tables: {  }
    columns: {  }
    dependencies: {  }
XC-Upselling:
    tables: [upselling_products]
    columns: {  }
    dependencies: {  }
XC-VendorMessages:
    tables: [conversations, conversation_members, vendor_convo_message_reads, vendor_convo_messages]
    columns: {  }
    dependencies: {  }
XC-Webmoney:
    tables: {  }
    columns: {  }
    dependencies: {  }
XC-YandexCheckout:
    tables: {  }
    columns: { tax_classes: { yandexMoneyVATRate: 'yandexMoneyVATRate INT NOT NULL' }, products: { YMPaymentSubject: 'YMPaymentSubject VARCHAR(255) NOT NULL' } }
    dependencies: {  }
