JMS SERIALIZER
========================
Il est bien évidemment possible de sérialiser vos ressources à la main, néanmoins, il existe une librairie très pratique nous offrant toutes sortes d'options pour travailler aisément. Nous allons utiliser la librairie JMSSerializer au travers du bundle JMSSerializerBundle pour profiter de l'intégration facilitée des nombreuses fonctionnalités que comporte cette librairie tierce.

Qu'est-ce qu'il y a à l'intérieur??
--------------
Cette librairie propose de nombreuses fonctionnalités :

 * linéariser (sérialisation) un graph d'objets (un objet peut en contenir d'autres, ce que l'on appelle un "graph d'objets") en chaîne de caractères (JSON, XML) ;
 *  délinéariser (désérialisation) une chaîne de caractères pour obtenir un graph d'objets ;


Allez plus loin avec JMS Serializer 
--------------

  * **Politique d'exclusion** 
  * **Groupe de sérialisation**  
  * **Annotations** -  (@ExclusionPolicy
                         @Exclude
                         @Expose
                         @SkipWhenEmpty
                         @SerializedName
                         @Since
                         @Until
                         @Groups
                         @MaxDepth
                         @AccessType
                         @Accessor
                         @AccessorOrder
                         @VirtualProperty
                         @Inline
                         @ReadOnly
                         @PreSerialize
                         @PostSerialize
                         @PostDeserialize
                         @Discriminator
                         @Type
                         @XmlRoot
                         @XmlAttribute
                         @XmlDiscriminator
                         @XmlValue
                         @XmlList
                         @XmlMap
                         @XmlKeyValuePairs
                         @XmlAttributeMap
                         @XmlElement
                         @XmlNamespace)
Enjoy!
Documentation :
    http://jmsyst.com/libs/serializer/master/reference/annotations
    http://jmsyst.com/libs/serializer/master/cookbook/exclusion_strategies
    https://jmsyst.com/bundles/JMSSerializerBundle