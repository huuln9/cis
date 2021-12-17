import 'package:flutter/material.dart';

class MenuUI extends StatelessWidget {
  const MenuUI({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return SafeArea(
      child: Scaffold(
        appBar: PreferredSize(
          preferredSize: const Size.fromHeight(100),
          child: Container(
            decoration: const BoxDecoration(
              image: DecorationImage(
                image: NetworkImage(
                    'https://raw.githubusercontent.com/huuln9/images/main/banner_2.png'),
                fit: BoxFit.cover,
              ),
            ),
            child: Align(
              alignment: Alignment.centerLeft,
              child: TextButton.icon(
                onPressed: () => {},
                icon: const Icon(
                  Icons.account_circle,
                  size: 50,
                  color: Colors.white,
                ),
                label: const Text(
                  "Đăng nhập",
                  style: TextStyle(fontSize: 18, color: Colors.white),
                ),
              ),
            ),
          ),
        ),
        body: Column(
          mainAxisAlignment: MainAxisAlignment.start,
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Padding(
              padding: const EdgeInsets.only(top: 10.0, left: 10, right: 10),
              child: Column(
                mainAxisAlignment: MainAxisAlignment.start,
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  TextButton.icon(
                    onPressed: () =>
                        Navigator.of(context).pushNamed('', arguments: []),
                    icon: SizedBox(
                      width: 40,
                      height: 40,
                      child: Image.network(
                          'https://raw.githubusercontent.com/huuln9/images/main/education_2.png'),
                    ),
                    label: const Text(
                      'Truog hoc',
                      style: TextStyle(
                        color: Colors.black,
                        fontSize: 18,
                      ),
                    ),
                  ),
                  const Padding(
                    padding: EdgeInsets.only(left: 10, right: 10, bottom: 10),
                    child: Divider(thickness: 1.0),
                  ),
                ],
              ),
            ),
          ],
        ),
      ),
    );
  }
}
