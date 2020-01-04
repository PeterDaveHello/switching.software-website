---
title: The Fediverse
subtitle: What are Federated Sites?
icon: icon.svg
aliases:
    - /federated-sites/
---

Most alternative social media are federated, decentralised or "part of the Fediverse". But what does this actually mean?

In a nutshell: Federated sites are **split across many smaller sites** that are linked together. People who sign up on one small site can make friends with people on other small sites, because they’re part of the same federated network. From the user’s point of view, it’s just like using one large site. The federated social network Mastodon has quite a good [video explaining how decentralisation works][masto-video].

{{% infobox "green" %}}
The 'Fediverse' is a network of independent websites, that exchange content with each other.
{{% /infobox %}}

This may sound complicated, but **all of us use a federated system every day**. Whether it's your  our cellphone contract, your bank account or your email address: It's your choice, with which provider you settle. Based on a uniform identifier (IBAN, mobile phone number or email address), you can interact with everyone in the corresponding network. These options remain available to you even after changing the provider. All you have to do is pass on your new identifier to your contacts.

Federated sites do the same for social networks. In general, the **identifier of an account** is similar to an email address, prefixed with an additional '@' sign. It consists of your login name and the website you chose. An example of this is our [@switchingsoftware@mstdn.swiso.org][swiso] identifier.

{{% infobox "green" %}}
Every person can be contacted in the 'Fediverse' via a unique identifier @username@website.
{{% /infobox %}}

The "providers" of the Fediverse are **mainly private individuals and non-profit organizations**. They do not pursue commercial interests by operating their instances. In addition, none of them has control over the entire network. This results in a high level of protection against failures and censorship. In addition, this strengthens privacy, as there is no central database for evaluations.

Most instances are comparatively **small and manageable**. This makes it much easier to get in touch with administrators and moderators. The best-case scenario being: You know them personally (or are actually a part of them) and therefore have high confidence in them. Advanced users can also run their own instance - either on their own or supported by services like [masto.host][masto.host] or [app.spacebear.ee][spacebear].

{{% infobox "green" %}}
Thanks to its design, the Fediverse is more personal, flexible and secure than centrally managed social networks with a commercial background.
{{% /infobox %}}

Despite all these advantages, the Fediverse is essentially a social network. It aims at the **free and open exchange of information** and uses standardized protocols developed for this purpose (e.g. [ActivityPub][ap] and [OStatus][ostatus]). End-to-end encryption is currently not part of these protocols. This means: Your messages are transmitted encrypted (transport encrypted), but admins of the participating instances still have access to the plain text.

**For maximum privacy**, you should therefore prefer services with end-to-end encryption. Otherwise, keep in mind that direct messages could also be read by admins of the involved instances - for example, if the recipient reports them. Furthermore, as with other services, the same applies in the Fediverse: Public messages are always visible to everyone. Accordingly, third parties can index and analyze them.

{{% infobox "green" %}}
The Fediverse still has a few weaknesses. Private communication remains more secure by using services with end-to-end encryption.
{{% /infobox %}}

Nevertheless the Fediverse is more than worth a try. There are [a lot of people][fed-stats] who already use it - a [list of Fediverse services][fedi-list] can be seen here. We also have some tipps on [how to find friends in the Fediverse][fedi-friends].

[ap]: https://activitypub.rocks/
[fedi-friends]:  {{< ref "/articles/howto-make-friends-on-fediverse" >}}
[fedi-list]:  {{< ref "/lists/fediverse" >}}
[fed-stats]: https://the-federation.info/
[masto.host]: https://masto.host
[masto-video]: https://peertube.social/videos/watch/d7fabc85-f110-4699-beb0-7edf6d4082ba
[ostatus]: https://en.wikipedia.org/wiki/OStatus
[spacebear]: https://app.spacebear.ee/
[swiso]: https://mstdn.swiso.org/@switchingsoftware