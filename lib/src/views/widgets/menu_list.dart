import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:vncitizens_home/src/controllers/configuration_controller.dart';
import 'package:vncitizens_authentication/vncitizens_authentication.dart';

class MenuList extends GetView<AuthenticationController> {
  const MenuList({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    final ConfigurationController configurationController = Get.find();
    final config = configurationController.getConfiguration();
    List<dynamic> homeMenu =
        config['homeMenu'] != null ? List.from(config['homeMenu']) : [];

    return SafeArea(
      child: Scaffold(
        body: Container(
          decoration: const BoxDecoration(
            image: DecorationImage(
              image: AssetImage("assets/images/bg.jpg"),
              fit: BoxFit.cover,
            ),
          ),
          child: Column(
            children: [
              const Padding(padding: EdgeInsets.only(bottom: 10)),
              const Align(
                alignment: Alignment.center,
                child: Text(
                  "TienGiangS",
                  style: TextStyle(
                    fontSize: 24,
                    fontWeight: FontWeight.bold,
                    color: Colors.blue,
                  ),
                ),
              ),
              const Padding(padding: EdgeInsets.only(bottom: 10)),
              Align(
                alignment: Alignment.topLeft,
                child: TextButton.icon(
                  onPressed: () => {},
                  icon: const Icon(Icons.account_circle, size: 50),
                  label: Container(
                    padding: const EdgeInsets.all(10),
                    decoration: BoxDecoration(
                      color: Colors.white,
                      borderRadius: BorderRadius.circular(3),
                    ),
                    child: controller.getAuthenticationStatus() ==
                            AuthenticationStatus.authenticated
                        ? const Text(
                            "AUTHENTICATED",
                            style: TextStyle(fontSize: 18, color: Colors.red),
                          )
                        : const Text(
                            "ĐĂNG NHẬP/ĐĂNG KÝ",
                            style: TextStyle(fontSize: 18, color: Colors.red),
                          ),
                  ),
                ),
              ),
              const Padding(padding: EdgeInsets.only(bottom: 10)),
              Align(
                alignment: Alignment.topLeft,
                child: Column(
                  mainAxisAlignment: MainAxisAlignment.start,
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    for (var i = 0; i < homeMenu.length; i++)
                      if (homeMenu[i]['enable'])
                        Padding(
                          padding: const EdgeInsets.all(5.0),
                          child: TextButton.icon(
                            onPressed: () => Navigator.of(context).pushNamed(
                              homeMenu[i]['route'],
                              arguments: [
                                homeMenu[i]['name'] + "'s List",
                                homeMenu[i]['tagId'],
                              ],
                            ),
                            icon: SizedBox(
                              width: 30,
                              height: 30,
                              child: Image.network(homeMenu[i]['image']),
                            ),
                            label: Text(
                              "     " + homeMenu[i]['name'],
                              style: const TextStyle(
                                color: Colors.black,
                                fontSize: 18,
                              ),
                            ),
                          ),
                        ),
                  ],
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
